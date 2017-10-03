@extends('front.template.main')

@section('content')
    <div class="blog-header">
        <h1 class="blog-title">Laravel news</h1>
        <p class="lead blog-description">Enterate de las últimas noticias de Láravel</p>
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">
            @foreach ($articles as $article)
                <div class="blog-post">
                    <a href="{{ route('view.article', $article->slug) }}">
                        <h2 class="blog-post-title">{{ $article->title }}</h2>
                    </a>

                    <p class="blog-post-meta">
                      <span>{{ $article->category->name }}</span> - {{ $article->created_at->diffForHumans() }}
                    </p>

                    <a href="{{ route('view.article', $article->slug) }}">
                        @foreach ($article->images as $image)
                            <img src="{{ asset('images/articles/'.$image->name) }}" class="img-responsive"></img>
                        @endforeach
                    </a>
                </div><!-- /.blog-post -->
            @endforeach
            <div class="text-center">
               {{ $articles->links() }}
            </div>
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            @include('front.template.partials.aside')
        </div><!-- /.blog-sidebar -->
    </div><!-- /.row -->

    <footer class="blog-footer">
        <div class="panel-footer">Todos los derechos reservados © 2017</div>
    </footer>
@endsection
