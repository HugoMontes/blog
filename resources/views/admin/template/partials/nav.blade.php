<div class="container">
    <nav class="navbar navbar-default">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                @auth
                    @if (Auth::user()->admin())
                        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                    @endif
                    <li><a href="{{ route('categories.index') }}">Categorías</a></li>
                    <li><a href="{{ route('articles.index') }}">Artículos</a></li>
                    <li><a href="{{ route('images.index') }}">Imágenes</a></li>
                    <li><a href="{{ route('tags.index') }}">Tags</a></li>
                @endguest
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container -->
