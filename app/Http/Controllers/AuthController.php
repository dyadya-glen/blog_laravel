<?php namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SignInRequest;
use App\Models\Profile;
use App\Models\User;

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
        try {
            $authEmail = User::where('email', '=', $request->input('email'))
                ->first(['email', 'password']);
            $authPassword = password_verify($request->input('password'),$authEmail->password);
        }  catch (\Exception $e) {
            $authEmail = false;
            $authPassword = false;
        }


        if (!$authEmail || !$authPassword) {
            return redirect()
                ->back()
                ->with('message-email', 'Пароль или E-mail введён неверно!')
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
        /*try{
            $user = new User();
            $user->email = $request->input('email');
            $user->password = password_hash($request->input('password'), PASSWORD_ARGON2I);
            $user->remember_token = md5($request->input('email'));
            $user->save();

            $profile = new Profile();
            $profile->name = $request->input('name');
            $profile->phone = preg_replace('![^0-9]+!', '', $request->input('phone'));
            $profile->user_id = DB::getPdo()->lastInsertId();
            $profile->save();
        } catch (\Exception $e ){
            $user = false;
            $profile = false;
        }

        if (!$user || !$profile) {
            return redirect()
                ->back()
                ->with('access', 'NO');
        }

        return redirect()
            ->back()
            ->with('success', 'YES');*/
        try{
            $userAdd = User::create([
                'email' => $request->input('email'),
                'password' => password_hash($request->input('password'), PASSWORD_ARGON2I),
                'remember_token' => md5($request->input('email')),
            ]);

            $profileAdd = Profile::create([
                'name' => $request->input('name'),
                'phone' => preg_replace('![^0-9]+!', '', $request->input('phone')),
                'user_id' => $userAdd->id,
            ]);
         } catch (\Exception $e ){
            $profileAdd = false;
            $userAdd = false;
        }

        if (!$userAdd || !$profileAdd) {
            return redirect()
                ->back()
                ->with('access', 'NO');
        }

        return redirect()
            ->back()
            ->with('success', 'YES');
    }
}
