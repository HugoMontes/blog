<div class="container">
    <nav class="navbar navbar-default">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Inicio</a></li>
                <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                <li><a href="#">Categorías</a></li>
                <li><a href="#">Artículos</a></li>
                <li><a href="#">Imágenes</a></li>
                <li><a href="#">Tags</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Página principal</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container -->
