<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function showFeedbackForm ()
    {
        return view('layouts.primary',[
            'page' => 'pages.feedback',
            'title' => 'Пишите мне'
        ]);
    }

    public function postingFeedbackData(Request $request)
    {
        $errors = [];
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        if ($request->filled($name)) {
            $errors[] = 'Поле Имя обязательно для заполнения!';
        }
        elseif (mb_strlen($name) < 2) {
            $errors[] = 'Поле Имя должно быть не менее двух символов!';
        }

        if ($request->filled($email)) {
            $errors[] = 'Поле Email обязательно для заполнения!';
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Поле "адрес e-mail" должно быть действительным электронным адресом.';
        }

        if ($request->filled($message)) {
            $errors[] = 'Текстовое поле обязательно для заполнения!';
        }
        elseif (mb_strlen($message) < 10) {
            $errors[] = 'Сообщение  должно содердать не менее десяти символов.';
        }

        return view('layouts.primary',[
            'page' => 'pages.feedback',
            'title' => 'Пишите мне',
            'errors' => $errors,
            'name' => $name,
            'email' => $email,
            'message' => $message
        ]);
    }
}
