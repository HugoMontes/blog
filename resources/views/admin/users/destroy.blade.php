@extends('admin.template.main')

@section('title', 'Eliminar usuario')

@section('content')
    {!! Form::open(['route' => 'users.destroy', 'method' => 'delete']) !!}
        <h2>¿Esta seguro que desea eliminar al usuario?</h2>
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo electrónico') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Tipo de usuario') !!}
            {!! Form::select('type', ['' =>'-------', 'member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
