<?php namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SignInRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $remember = $request->input('remember') ? true : false;

       $authResult = Auth::attempt([
           'email' => $request->input('email'),
           'password' => $request->input('password'),
       ], $remember);

       if ($authResult){
           return redirect('/');
       }
       else {
           return redirect()
                ->back()
                ->with('message-email', 'Пароль или E-mail введён неверно!')
                ->withInput();
       }
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

    /**
     * action logOut
     */

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('showSignInPage');
    }
}
