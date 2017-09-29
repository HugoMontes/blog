@extends('admin.template.main')

@section('title', 'Lista de usuarios')

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-success" style="margin-bottom:1em">Nuevo usuario</a>

    <table class="table">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Tipo</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->type == 'admin')
                            <strong>{{ $user->type }}
                        @else
                            {{ $user->type }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-xs pull-left">Editar</a>
                        {!! Form::open(['route' => ['users.destroy', $user], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs',
                                'style' => 'margin-left: 1em', 'onClick' => "return confirm('¿Estas seguro de eliminar al usuario?')"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        {{ $users->links() }}
    </div>
@endsection
