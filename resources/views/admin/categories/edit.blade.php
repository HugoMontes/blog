@extends('admin.template.main')

@section('title', 'Editar categoría')

@section('content')
    {!! Form::open(['route' => ['categories.update', $category], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', $category->name, ['class' => 'form-control',
                'placeholder' => 'Nombre de la categoría', 'required']) !!}
        </div>

        {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
