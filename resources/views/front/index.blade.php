@extends('front.template.main')

@section('title', 'Artículos')

@section('content')
    <div class="blog-header">
        <h1 class="blog-title">Laravel news</h1>
        <p class="lead blog-description">Enterate de las últimas noticias de Láravel</p>
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">
            @foreach ($articles as $article)
                <div class="blog-post">
                    <h2 class="blog-post-title">{{ $article->title }}</h2>
                    <p class="blog-post-meta">
                      <span>{{ $article->category->name }}</span> - {{ $article->created_at->diffForHumans() }}
                    </p>
                    @foreach ($article->images as $image)
                        <img src="{{ asset("images/articles/{$image->name}") }}" class="img-responsive"></img>
                    @endforeach
                    {{-- <div>{{ $article->content }}</div> --}}
                </div><!-- /.blog-post -->
            @endforeach
            <div class="text-center">
               {{ $articles->links() }}
            </div>
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module">
            <h4>Categorías</h4>
            <ol class="list-unstyled">
              <li><a href="#">Framework</a></li>
              <li><a href="#">Programación</a></li>
              <li><a href="#">Noticias</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Tags</h4>
            <ol class="list-unstyled">
              <li><a href="#">PHP</a></li>
              <li><a href="#">Laravel</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->
    </div><!-- /.row -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
@endsection
