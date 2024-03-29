<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipentsController;
use App\Http\Controllers\RecipientsCSVDATA;
use App\Http\Controllers\SendMails;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render(
        'Auth/Login'
    );
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('category', CategoryController::class);

    Route::resource('recipients', RecipentsController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // send mails
    Route::get('/send-mail', [SendMails::class, 'index'])->name('send.mail');
    Route::post('/send-mail', [SendMails::class, 'store'])->name('send.mail.store');

    Route::delete('/send-mail/{id}', [SendMails::class, 'destroy'])->name('send.mail.delete');



    //Sending Notifications

    // Route::get('/send-notify', function () {
    //     // $user = Recipents::find(1);
    //     // $user->notify(new RecipientsMail());
    //     $users = Recipents::all();
    //     foreach ($users as $user) {  
    //         $user->notify(new RecipientsMail());
    //     }
    // })->name('sendmail');


    Route::post('/csvimport', [RecipientsCSVDATA::class, 'store'])->name('recipients.csv');
    // Route::post('/upload', [RecipientsCSVDATA::class, 'upload'])->name('recipients.upload.file');
});

require __DIR__ . '/auth.php';
