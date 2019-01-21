    @extends('layout')

    @section('title', "Статья $id")

    @section('content')

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <h1>Статья {{ $id }}</h1>
                </div>
            </div>
        </div>
    @endsection

