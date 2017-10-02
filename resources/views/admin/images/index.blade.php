@extends('admin.template.main')

@section('title', 'Listado de categorías')

@section('content')
    <div class="row">
        @foreach ($images as $image)
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="{{ asset("images/articles/{$image->name}") }}" class="img-responsive"></img>
                    </div>
                    <div class="panel-footer">{{ $image->article->title }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
