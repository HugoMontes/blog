@extends('admin.template.main')

@section('title', 'Editar artículo: ' . $article->title)

@section('content')
    {!! Form::open(['route' => ['articles.update', $article], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Título') !!}
            {!! Form::text('title', $article->title, ['class' => 'form-control',
                'placeholder' => 'Título del artículo', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Categoría') !!}
            {!! Form::select('category_id', $categories, $article->category->id, ['class' => 'form-control select-category',
                'placeholder' => 'Seleccione una opción', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Contenido') !!}
            {!! Form::textarea('content', $article->content, ['class' => 'form-control textarea-content',
                'placeholder' => 'Contenido del artículo', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags', 'Tags') !!}
            {!! Form::select('tags[]', $tags, $tagsOriginal, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
        </div>

        {!! Form::submit('Aditar artículo', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection

@section('js')
    <script>
        $(".select-tag").chosen({
            disable_search_threshold: 3,
            placeholder_text_multiple: 'Seleccione un máximo de tres tasgs',
            max_selected_options: 3,
        });

        $(".select-category").chosen({});

        $('.textarea-content').trumbowyg({
            lang: 'es'
        });
    </script>
@endsection
