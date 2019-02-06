<div class="col-12 col-md-8 col-offset-0 col-md-offset-2">
    <div class="widget-author widget-register-form boxed">
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <h2>Регистрация</h2>
                <p>Поля, отмеченные *, являются обязательными для заполнения.</p>
                <form  method="POST" class="form-horizontal">
                        @csrf
                    @if ($errors->has('email'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('email') }} </label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Адрес e-mail <span class="req-field">*</span></label>
                    @endif
                        <input type="text" class="form-control" name="email" placeholder="user@domain.ru" value="{{ old('email', '') }}">
                    </div>


                    @if ($errors->has('password'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('password') }} </label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Ваш пароль <span class="req-field">*</span></label>
                    @endif
                        <input type="password" class="form-control" name="password" value="" placeholder="Придумайте пароль">
                    </div>


                    @if ($errors->has('password_confirm'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('password_confirm') }} </label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Ваш пароль <span class="req-field">*</span></label>
                    @endif
                        <input type="password" class="form-control" name="password_confirm" value="" placeholder="Пароль еще раз">
                    </div>


                    @if ($errors->has('name'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('name') }} </label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Имя или никнейм <span class="req-field">*</span></label>
                    @endif
                        <input type="text" class="form-control" name="name" placeholder="Иван Иванов" value="{{ old('name', '') }}">
                    </div>

                    @if ($errors->has('phone'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('phone') }}</label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Мобильный телефон</label>
                    @endif
                        <input type="text" class="form-control" id="register_phone" name="phone" placeholder="+7 (999) 222-33-44" value="{{ old('phone', '') }}">
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_confirmed">
                                    @if ($errors->has('is_confirmed'))
                                    <psan class="text-danger">{{ $errors->first('is_confirmed') }}</psan>
                                    @else
                                    <span class="text-no-error">Согласен на хранение и обработку персональных данных</span>
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn btn-gray">Очистить</button>
                        </div>
                    </div>
                    <div class="push-down-30">
                        Уже зарегистрированы? <a href="/auth/signin" style="cursor: pointer">Войти</a>
                    </div>
                </form>

                {{--@else--}}
                {{--<div class="contact">--}}
                {{--<h3>Завершение регистрации</h3>--}}
                {{--<p class="contact__text">Для завершения регистрации, мы выслали на указанный вами e-mail адрес письмо. <strong>Если вы не обнаружите письмо, проверте вкладку СПАМ вашего e-mail, возможно оно попало туда!</strong></p>--}}
                {{--<a href="/">На главную</a>--}}
                {{--</div>--}}
                {{--@endif--}}
            </div>
        </div>
    </div>
</div>

