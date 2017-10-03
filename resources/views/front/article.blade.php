@extends('front.template.main')

@section('content')
    <div class="blog-header">
        <a href="{{ url('/') }}">
            <h1 class="blog-title">Laravel news</h1>
        </a>
        <p class="lead blog-description">Enterate de las últimas noticias de Láravel</p>
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $article->title }}</h2>

                <p class="blog-post-meta">
                  <span>{{ $article->category->name }}</span> - {{ $article->created_at->diffForHumans() }}
                </p>

                @foreach ($article->images as $image)
                    <img src="{{ asset('images/articles/'.$image->name) }}" class="img-responsive"></img>
                @endforeach

                <hr>
                <div style="font-size: 2rem">
                    {!! $article->content !!}
                </div>

                <hr>
                <h2>Comentarios</h2>
                {{-- Insert disqus --}}

            </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            @include('front.template.partials.aside')
        </div><!-- /.blog-sidebar -->
    </div><!-- /.row -->
@endsection
