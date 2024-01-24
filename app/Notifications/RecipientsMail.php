<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecipientsMail extends Notification implements ShouldQueue
{
    use Queueable;
    public $mail_subject = '';
    public $mail_body = '';

    public function __construct($mail_subject, $mail_body)
    {
        $this->mail_subject = $mail_subject;
        $this->mail_body = $mail_body;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {

        $mail_subject = $this->mail_subject;
        $mail_body = $this->mail_body;

        return (new MailMessage)->subject($mail_subject)->view('email', compact('mail_body'));
        // email is a blade file 
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
