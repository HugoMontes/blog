<div class="container">
    <nav class="navbar navbar-default">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @guest
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                @else
                    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                    <li><a href="{{ route('categories.index') }}">Categorías</a></li>
                    <li><a href="#">Artículos</a></li>
                    <li><a href="#">Imágenes</a></li>
                    <li><a href="#">Tags</a></li>
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
