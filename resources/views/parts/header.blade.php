    <header class="header  push-down-45">
        <div class="container">
            <div class="logo pull-left">
                <a href="/">
                    <img src="/assets/images/logo.png" alt="Logo" width="352" height="140">
                </a>
            </div>
            <nav class="navbar navbar-default" role="navigation">
                <div class="collapse  navbar-collapse" id="readable-navbar-collapse">
                    <ul class="navigation">
                        {!! $mainMenu ?? '' !!}
                        @unless (Auth::check())
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Авторизация</a>
                            <ul class="navigation__dropdown">
                                <li><a href="/auth/signin">Вход</a></li>
                                <li><a href="/auth/signup">Регистрация</a></li>
                            </ul>
                        </li>
                        @endunless
                        @auth
                            @can('create', App\Models\Post::class)
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="/post/creation">Добавить пост</a>
                        </li>
                            @endcan
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="/auth/logout">Выйти</a>
                        </li>
                        @endauth
                    </ul>

                </div>
            </nav>
            <div class="pull-right">
            </div>
            <div class="hidden-xs hidden-sm">
                <a href="#" class="search__container  js--toggle-search-mode"> <span class="glyphicon  glyphicon-search"></span> </a>
            </div>
        </div>
    </header>