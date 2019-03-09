<div class="boxed  push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            @if(!empty($errors))
            <div class="contact">
                <h2>Обратная связь</h2>
                <p class="contact__text">Спрашивайте, что только пожелаете! Но помните - на глупые вопросы глупо ждать ответа!</p>
                <form  method="POST">
                    @csrf
                    <div class="row">
                        @if ($errors->has('name'))
                        <div class="form-group text-left has-error">
                            <label class="control-label">{{ $errors->first('name') }}</label>
                        @else
                        <div class="form-group text-left">
                            <label class="control-label">Имя/Никнейм <span class="req-field">*</span></label>
                        @endif
                            <input type="text" class="form-control" name="name" value="{{ old('name', '') }}" placeholder="Имя или что там у вас? *">
                        </div>

                        @if ($errors->has('email'))
                        <div class="form-group text-left has-error">
                            <label class="control-label">{{ $errors->first('email') }}</label>
                        @else
                        <div class="form-group text-left">
                            <label class="control-label">E-mail <span class="req-field">*</span></label>
                        @endif
                            <input type="text" class="form-control" name="email" value="{{ old('email', '') }}" placeholder="И e-mail не забудьте *">
                        </div>

                        @if ($errors->has('message'))
                        <div class="form-group text-left has-error">
                            <label class="control-label">{{ $errors->first('message') }}</label>
                        @else
                        <div class="form-group text-left">
                            <label class="control-label">Написать сообщение!<span class="req-field">*</span></label>
                        @endif
                            <textarea class="form-control" rows="6" type="text" name="message" placeholder="Пишите, не стесняйтесь! *">{{ old('message', '') }}</textarea>
                        </div>
                        <div class="form-group text-left">
                            <button type="submit" class="btn  btn-primary">Отправить</button>
                            <span class="contact__obligatory">Поля, помеченные * обязательны для заполнения</span>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="contact">
                <h2>Сообщение отправлено!</h2>
                <p class="contact__text">Спасибо за ваше сообщение!</p>
                <a href="feedback">Написать еще</a>
            </div>
            @endif
        </div>
    </div>
</div>

