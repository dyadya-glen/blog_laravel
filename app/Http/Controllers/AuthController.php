<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * actions Sign In
     */

    public function showSignInForm ()
    {
        return view('layouts.secondary',[
            'page' => 'pages.sign-in',
            'title' => 'Вход'
        ]);
    }

    public function postingSignInData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|alpha_num',
            'email' => 'required|email',
            'password' => 'required|min:6|max:32',
            'password_confirm' => 'required|same:password',
            'is_confirmed' => 'accepted',
        ]);
//        $errors = [];
//        $email = $request->input('email');
//        $password = $request->input('password');
//
//        if ($request->filled($email)) {
//            $errors[] = 'Поле Email обязательно для заполнения!';
//        }
//        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            $errors[] = 'Поле "адрес e-mail" должно быть действительным электронным адресом.';
//        }
//
//        if ($request->filled($password)) {
//            $errors[] = 'Поле Пароль обязательно для заполнения!';
//        }
//        elseif (mb_strlen($password) < 5) {
//            $errors[] = 'Поле Пароль должно быть не менее пяти символов!';
//        }
//
//        if (count($errors) === 0) {
//            return redirect()->route('homePage');
//        }

        return view('layouts.secondary',[
            'page' => 'pages.sign-in',
            'title' => 'Вход',
//            'errors' => $errors,
//            'email' => $email,
        ]);
    }

    /**
     * actions Sign Up
     */

    public function showSignUpForm ()
    {
        return view('layouts.secondary',[
            'page' => 'pages.sign-up',
            'title' => 'Регистрация',
        ]);
    }

    public function postingSignUpData(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:32',
            'password_confirm' => 'required|same:password',
            'is_confirmed' => 'accepted',
            'name' => 'required|min:2|alpha_num',
            'phone' => 'nullable|regex:/^(\+?\d{1,3}\s?\(\d{3}\)\s?\d{3}(-\d{2}){2})?$/'
        ]);
        return back();
    }
}
