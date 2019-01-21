    @extends('layout')

    @section('title', 'Новая статья')

    @section('content')

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <div class="error" style="color: red; font-size: 18px;">{{ $errorMessage ?? '' }}</div>
                    <form method="POST" action='/article-add'>
                        <div class="form-group">
                            <label for="title">Заголовок статьи:</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ $title ?? '' }}">
                            <label for="text">Содержание:</label>
                            <textarea class="form-control" id="text" rows="3" name="text">{{ $text ?? '' }}</textarea>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Добавить">
                    </form>
                </div>
            </div>
        </div>
    @endsection
