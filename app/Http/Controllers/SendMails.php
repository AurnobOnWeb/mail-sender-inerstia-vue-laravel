<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Category;
use App\Models\sendmails as ModelsSendmails;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SendMails extends Controller
{
    public function index(Request $request)
    {
        $sendMails = ModelsSendmails::with('category')
            ->when($request->input('search'), function ($query, $search) {
                $query->where('mail_subject', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($categoryQuery) use ($search) {
                        $categoryQuery->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        $filter = $request->input('search');

        $categorylist = Category::where('status', '=', 'Active')->get();
        return Inertia::render("SendMails/SendMails", compact('sendMails', 'filter', 'categorylist'));
    }
    public function store(MailRequest $request)
    {
        ModelsSendmails::create($request->validated());
        return redirect()->route('send.mail');
    }
    public function destroy($id)
    {
        $recipients = ModelsSendmails::find($id);
        $recipients->delete();
        return redirect()->route('send.mail');
    }
}
