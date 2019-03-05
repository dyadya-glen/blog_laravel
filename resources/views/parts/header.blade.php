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
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="/post/creation">Добавить пост</a>
                        </li>
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