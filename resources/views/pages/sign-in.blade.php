<div class="col-12 col-md-8 col-offset-0 col-md-offset-2">
    <div class="widget-author widget-register-form boxed">
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <h2>Авторизация</h2>
                <p>Для продолжения необходимо ввести логин и пароль</p>
                <div class="error" style="color: red; font-size: 18px;">
                    @forelse($errors as $error)
                        <p style="font-size: 14px; color: red">{{ $error }}</p>
                    @empty

                    @endforelse
                </div>
                <form  method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Адрес e-mail <span class="req-field">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" placeholder="user@domain.ru" value="{{ $email ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Ваш пароль <span class="req-field">*</span></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" value="" placeholder="Придумайте пароль">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_confirmed"><span class="text-no-error">Запомнить меня</span></label>
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

