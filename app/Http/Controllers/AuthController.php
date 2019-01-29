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
        $errors = [];
        $email = $request->input('email');
        $password = $request->input('password');

        if (empty($email)) {
            $errors[] = 'Поле Email обязательно для заполнения!';
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Поле "адрес e-mail" должно быть действительным электронным адресом.';
        }

        if (empty($password)) {
            $errors[] = 'Поле Пароль обязательно для заполнения!';
        }
        elseif (mb_strlen($password) < 5) {
            $errors[] = 'Поле Пароль должно быть не менее пяти символов!';
        }

        if (count($errors) === 0) {
            return redirect()->route('homePage');
        }

        return view('layouts.secondary',[
            'page' => 'pages.sign-in',
            'title' => 'Вход',
            'errors' => $errors,
            'email' => $email,
        ]);
    }

    /**
     * actions Sign Up
     */

    public function showSignUpForm ()
    {
        return view('layouts.secondary',[
            'page' => 'pages.sign-up',
            'title' => 'Регистрация'
        ]);
    }

    public function postingSignUpData(Request $request)
    {
        $errors = [];
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('password_confirm');
        $name = $request->input('name');
        $phone = $request->input('phone');

        if (empty($email)) {
            $errors[] = 'Поле Email обязательно для заполнения!';
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Поле "адрес e-mail" должно быть действительным электронным адресом.';
        }

        if (empty($password)) {
            $errors[] = 'Поле Пароль обязательно для заполнения!';
        }
        elseif (mb_strlen($password) < 5) {
            $errors[] = 'Поле Пароль должно быть не менее пяти символов!';
        }

        if (empty($password)) {
            $errors[] = 'Поле Подтверждение обязательно для заполнения!';
        }
        elseif ($passwordConfirm !== $password) {
            $errors[] = 'Поля Пароль и Подтверждение не совпадают';
        }

        return view('layouts.secondary',[
            'page' => 'pages.sign-up',
            'title' => 'Регистрация',
            'errors' => $errors,
            'email' => $email,
//            'password' => $password,
//            'passwordConfirm' => $passwordConfirm,
            'name' => $name,
            'phone' => $phone
        ]);
    }
}
