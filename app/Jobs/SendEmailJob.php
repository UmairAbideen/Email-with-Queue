<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $title;
    public $subject;
    public $body;
    public $email;
    public $attachmentPath;

    public function __construct($title, $subject, $body, $email, $attachmentPath = null)
    {
        $this->title = $title;
        $this->subject = $subject;
        $this->body = $body;
        $this->email = $email;
        $this->attachmentPath = $attachmentPath;
    }

    public function handle()
    {
        Mail::send('message', [
            'title' => $this->title,
            'body' => $this->body
        ], function ($message) {
            $message->to($this->email);
            $message->subject($this->subject);

            if ($this->attachmentPath) {
                $message->attach($this->attachmentPath);
            }
        });
    }
}
