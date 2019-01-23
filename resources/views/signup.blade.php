    @extends('layout')

    @section('title', 'Регистрация')

    @section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <div class="error" style="color: red; font-size: 18px;">{{ $errorMessage ?? '' }}</div>
                    <form method="POST" action='/sign-up'>
                        @csrf
                        <div class="form-group">
                            <label for="signUpLogin">Login:</label>
                            <input class="form-control" type="text" name="login" id="signUpLogin" value="{{ $inputVal ?? '' }}">
                            <label for="signUpPassword">Password:</label>
                            <input class="form-control" type="password" name="password" id="signUpPassword">
                            <label for="signUpPasswordConfirmation">Confirmation:</label>
                            <input class="form-control" type="password" name="password-confirmation" id="signUpPasswordConfirmation">
                        </div>
                        <input class="btn btn-primary" type="submit" value="Регистрация">
                    </form>
                    <a class="nav-link nav-link--underline" href="sign-in"><span>Вход</span></a>
                </div>
            </div>
        </div>
    @endsection
