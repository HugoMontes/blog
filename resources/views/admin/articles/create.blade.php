@extends('admin.template.main')

@section('title', 'Agregar artículo')

@section('content')
    {!! Form::open(['route' => 'articles.store', 'autocomplete' => 'off', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Título') !!}
            {!! Form::text('title', null, ['class' => 'form-control',
                'placeholder' => 'Título del artículo', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Categoría') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control select-category',
                'placeholder' => 'Seleccione una opción', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Contenido') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control textarea-content',
                'placeholder' => 'Contenido del artículo', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags', 'Tags') !!}
            {!! Form::select('tags[]', $tags, null, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Imagen') !!}
            {!! Form::file('image') !!}
        </div>

        {!! Form::submit('Agregar artículo', ['class' => 'btn btn-primary']) !!}
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
