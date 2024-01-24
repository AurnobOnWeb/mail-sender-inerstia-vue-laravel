<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Category;
use App\Models\Recipents;
use App\Models\sendmails as ModelsSendmails;
use App\Notifications\RecipientsMail;
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

        $newMail = ModelsSendmails::create($request->validated());

        // Retrieve recipients based on the given category_id
        $recipients = Recipents::where('category_id', $request->category_id)->get();

        $mail_subject = $request->mail_subject;
        $mail_body = $request->mail_body;

        // Notify each recipient using the RecipientsMail notification
        foreach ($recipients as $recipient) {
            $recipient->notify(new RecipientsMail($mail_subject, $mail_body));
        }

        // Redirect to the specified route after storing and notifying
        return redirect()->route('send.mail');
    }

    public function destroy($id)
    {
        $recipients = ModelsSendmails::find($id);
        $recipients->delete();
        return redirect()->route('send.mail');
    }
}
