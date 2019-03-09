<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    protected $errors = [];

    public function showFeedbackForm ()
    {
        return view('layouts.primary',[
            'page' => 'pages.feedback',
            'title' => 'Пишите мне'
        ]);
    }

    public function postingFeedbackData(FeedbackRequest $request)
    {
        Mail::to('glen2001@yandex.ru')
            ->cc('glen2001@yandex.ru')
            ->send(new FeedbackMail($request->all()));

        return view('layouts.primary', [
            'page' => 'pages.feedback',
            'title' => 'Пишите мне',
            'errors' => $this->errors
        ]);
    }
}
