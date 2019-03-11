<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function build()
    {
        return $this->view('mails.feedback')
            ->from(['address' => 'glen2001@yandex.ru'])
            ->with(['data' => $this->input])
            ->subject('Письмо с формы "обратная связь"')
            ->attach(base_path('public/assets/images/logo.png'));
    }
}
