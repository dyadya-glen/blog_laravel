<div class="col-12 col-md-8 col-offset-0 col-md-offset-2">
    <div class="widget-author widget-register-form boxed">
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <h2>Авторизация</h2>
                <p>Для продолжения необходимо ввести логин и пароль</p>
                <form  method="POST" class="form-horizontal">
                    @csrf
                    @if ($errors->has('email'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('email') }} </label>
                    @elseif(Session::get('message-email'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ Session::get('message-email') }} </label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Адрес e-mail <span class="req-field">*</span></label>
                    @endif
                        <input type="text" class="form-control" name="email" placeholder="user@domain.ru" value="{{ old('email', '') }}">
                    </div>


                    @if ($errors->has('password'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('password') }}</label>
                    @elseif(Session::get('message-password'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ Session::get('message-password') }}</label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Ваш пароль <span class="req-field">*</span></label>
                    @endif
                        <input type="password" class="form-control" name="password" value="" placeholder="Введите пароль">

                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"><span class="text-no-error">Запомнить меня</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Войти</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn btn-gray">Очистить</button>
                        </div>
                    </div>
                    <div class="push-down-30">
                        Еще не зарегистрированы?  <a href="/auth/signup" style="cursor: pointer"> Зарегистрироваться</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

