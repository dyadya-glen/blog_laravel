
<div class="col-12 col-md-8 col-offset-0 col-md-offset-2">
    <div class="widget-author widget-register-form boxed">
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <h2>Редактирование поста: {{ $titlePost }}</h2>
                <p>Поля, отмеченные *, являются обязательными для заполнения.</p>
                <form  method="POST" class="form-horizontal">
                        @csrf
                    @if ($errors->has('titlePost'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('titlePost') }}</label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Заголовок <span class="req-field">*</span></label>
                    @endif
                        <input type="text" class="form-control" name="title" value="{{ $titlePost }}">
                    </div>

                    @if ($errors->has('announce'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('announce') }}</label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Анонс <span class="req-field">*</span></label>
                    @endif
                        <textarea class="form-control tinymce"  rows="6" type="text" name="announce">{{ $announce }}</textarea>
                    </div>

                    @if ($errors->has('fulltext'))
                    <div class="form-group text-left has-error">
                        <label class="control-label">{{ $errors->first('fulltext') }}</label>
                    @else
                    <div class="form-group text-left">
                        <label class="control-label">Основное содержание <span class="req-field">*</span></label>
                    @endif
                        <textarea class="form-control tinymce"  rows="6" type="text" name="fulltext" placeholder="Основное содержание">{{ $fulltext }}</textarea>
                    </div>

                    <div class="form-group text-left">
                        <label class="control-label">Картинка </label>
                        <input type="text" class="form-control" name="image" placeholder="введите ссылку" value="{{ $image }}">
                    </div>
                    @if ($errors->has('categories'))
                    <div class="form-group  text-left has-error">
                        <label class="control-label">{{ $errors->first('categories') }}</label>
                    @else
                    <div class="form-group  text-left">
                        <label class="control-label">Выбор раздела </label>
                    @endif
                        <textarea class="form-control"  rows="6" type="text" name="categories" placeholder="Раздел">{{ $categories }}</textarea>
                    </div>
                    <div class="form-group  text-left">
                        <label class="control-label">Ваши теги </label>
                        <textarea class="form-control"  rows="6" type="text" name="tagline" placeholder="тег">{{  $tags }}</textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Добавить</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('bottom_scripts')
    <script src="assets/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea.tinymce',
            language:"ru",
            theme : "silver",
            plugins:[
                'link',
                'image',
                'code',
                'media',
                'imagetools',
                'colorpicker'
            ],
            toolbar:'undo redo | bold italic underline | link image imagetools media | code | colorpicker',
            bbcode_dialect: "punbb",
            menubar: false
        });
    </script>
@show
