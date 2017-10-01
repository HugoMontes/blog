@extends('admin.template.main')

@section('title', 'Agregar tag')

@section('content')
    {!! Form::open(['route' => ['tags.update', $tag], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', $tag->name, ['class' => 'form-control',
                'placeholder' => 'Nombre del tag', 'required']) !!}
        </div>

        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
