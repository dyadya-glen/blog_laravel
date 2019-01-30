<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function data()
    {
        $userData = [
            'data' => [
              'name' => 'Roman',
              'surname' => 'Gulyaev',
            ]
        ];

        return $userData;
    }

    public function article($id = 1)
    {
        return view('article',['id' => $id]);
    }

//    public function showLoginForm(Request $request)
//    {
//        $name = $request->input('name');
//        var_dump($name);
//        return view('login');
//    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function postingLoginData(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        if ($login === '111' && $password === '222') {
            return redirect()->route('homePage');
        }

        return view('login', ['errorMessage' => 'Неверный логин или пароль!', 'inputVal' => $login]);
    }

    public function showSignUpForm()
    {
        return view('signup');
    }

    public function showSignUpData(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        $passwordConf = $request->input('password-confirmation');

        if (
            (mb_strlen($login) > 2) &&
            (mb_strlen($password) >= 3) &&
            ($password === $passwordConf)
        ) {
            return redirect()->route('homePage');
        }

        return view('signup', ['errorMessage' => 'Введены некорректные данные!', 'inputVal' => $login]);
    }


    public function showArticleAddForm()
    {
        return view('article-add');
    }

    public function showArticleAddData(Request $request)
    {
        $title = $request->input('title');
        $text = $request->input('text');

        if (
            (mb_strlen($title) > 2) &&
            (mb_strlen($text) >= 3)
        ) {
            return redirect()->route('homePage');
        }

        return view('article-add', [
            'errorMessage' => 'Введены некорректные данные!',
            'title' => $title,
            'text' => $text,
            ]);
    }

    public function page (Request $request, $id = null)
    {
        if ($request->filled($id)){
            return '<a href="/page/12">link</a>';
        }
        return 'ID: ' . $id;
    }
}
