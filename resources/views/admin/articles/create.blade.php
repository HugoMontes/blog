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
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control',
                'placeholder' => 'Seleccione una opción', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Contenido') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control',
                'placeholder' => 'Contenido del artículo', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags', 'Tags') !!}
            {!! Form::select('tags', $tags, null, ['class' => 'form-control', 'multiple', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Imagen') !!}
            {!! Form::file('image') !!}
        </div>

        {!! Form::submit('Agrear artículo', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
