@extends('admin.template.main')

@section('title', 'Agregar categoría')

@section('content')
    {!! Form::open(['route' => 'categories.store', 'autocomplete' => 'off']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoría', 'required']) !!}
        </div>

        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
