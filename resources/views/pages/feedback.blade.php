<div class="boxed  push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            @if(!empty($errors))
            <div class="contact">
                <h2>Обратная связь</h2>
                <p class="contact__text">Спрашивайте, что только пожелаете! Но помните - на глупые вопросы глупо ждать ответа!</p>
                <div class="error" style="color: red; font-size: 18px;">
                    @forelse($errors as $error)
                        <p style="font-size: 14px;">{{ $error }}</p>
                    @empty

                    @endforelse
                </div>
                <form  method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="text" name="name" value="{{ $name ?? '' }}" placeholder="Имя или что там у вас? *">
                        </div>
                        <div class="col-xs-6">
                            <input type="text" name="email" value="{{ $email ?? '' }}" placeholder="И e-mail не забудьте *">
                        </div>
                        <div class="col-xs-12">
                            <textarea rows="6" type="text" name="message" placeholder="Пишите, не стесняйтесь! *">{{ $message ?? '' }}</textarea>
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

