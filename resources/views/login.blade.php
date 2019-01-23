    @extends('layout')

    @section('title', 'Вход')

    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <div class="error" style="color: red; font-size: 18px;">{{ $errorMessage ?? '' }}</div>
                    <form method="POST" action='/sign-in'>
                        @csrf
                        <div class="form-group">
                            <label for="signInLogin">Login:</label>
                            <input class="form-control" type="text" name="login" id="signInLogin" value="{{ $inputVal ?? '' }}">
                            <label for="signInPassword">Password:</label>
                            <input class="form-control" type="password" name="password" id="signInPassword">
                        </div>
                        <input class="btn btn-primary" type="submit" value="Войти">
                    </form>
                    <a class="nav-link nav-link--underline" href="sign-up"><span>Регистрация</span></a>
                </div>
            </div>
        </div>
    @endsection
