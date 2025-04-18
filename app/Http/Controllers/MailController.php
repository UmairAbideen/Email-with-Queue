<?php

namespace App\Http\Controllers;

use App\Mail\TestingMail;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // Send mail with subject/body using a queued Mailable class
    public function mail()
    {
        // Email data to be sent
        $data = [
            'subject' => "Testing subject",                 // Subject of the email
            'title' => "mail from m.khalid",                // Title (for view)
            'body' => "testing mail",                       // Email body (for view)
            'email' => "muhammad.umair@medzntech.com",      // Recipient
            'attachmentPath' => ""                          // Empty now, can hold file path later
        ];

        // Dispatch email to queue using Mailable (queued version)
        SendEmailJob::dispatch(
            $data['title'],
            $data['subject'],
            $data['body'],
            $data['email'],
            $data['attachmentPath']
        );


        // Dispatch email to queue using Mailable (queued version)
        // Mail::to($data['email'])->queue(
        //     new TestingMail($data['title'], $data['subject'], $data['body'], $data['attachmentPath'])
        // );


        // This is the non-queued alternative (commented out)
        /*
        Mail::send('message', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject($data['title']);
        });
        */

        dd("email has been sent (queued)");
    }
}
