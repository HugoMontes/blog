@extends('admin.template.main')

@section('title', 'Lista de usuarios')

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-info" style="margin-bottom:1em">Registrar nuevo usuario</a>

    <table class="table table-bordered">
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
                            <span class="label label-danger">{{ $user->type }}</span>
                        @else
                            <span class="label label-primary">{{ $user->type }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-danger"></a>
                        <a href="" class="btn btn-warning"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        {{ $users->links() }}
    </div>
@endsection
