@extends('admin.template.main')

@section('title', 'Editar usuario: ' . $user->name)

@section('content')
    {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo electrónico') !!}
            {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Tipo de usuario') !!}
            {!! Form::select('type', ['' =>'-------', 'member' => 'Miembro', 'admin' => 'Administrador'], $user->type, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
