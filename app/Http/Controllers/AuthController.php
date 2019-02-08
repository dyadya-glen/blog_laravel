<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function postingSignInData(SignInRequest $request)
    {
/*
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:32',
        ]);
*/
/*
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6|max:32'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
*/
        try {
            $authEmail = DB::table('users')
                ->where('email', '=', $request->input('email'))
                ->first(['email','password']);
        } catch (\Exception $e) {
            $authEmail = false;
        }

        if (!$authEmail) {
            return redirect()
                ->back()
                ->with('message-email', 'Введён неверный E-mail!')
                ->withInput();
        }

        if (!password_verify($request->input('password'),$authEmail->password)) {
            return redirect()
                ->back()
                ->with('message-password', 'Введён неверный пароль!')
                ->withInput();
        }

        return redirect('/');
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

    public function postingSignUpData(RegisterRequest $request)
    {
        try{
            $createdData = DB::table('users')->insert([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => password_hash($request->input('password'), PASSWORD_ARGON2I),
                'phone' => preg_replace('![^0-9]+!', '', $request->input('phone')),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        } catch (\Exception $e ){
            $createdData = false;
        }

        if (!$createdData) {
            return redirect()
                ->back()
                ->with('access', 'NO');
        }

        return redirect()
            ->back()
            ->with('success', 'YES');
    }
}
