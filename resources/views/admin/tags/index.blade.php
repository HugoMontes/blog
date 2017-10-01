@extends('admin.template.main')

@section('title', 'Listado de tags')

@section('content')
    <a href="{{ route('tags.create') }}" class="btn btn-primary">Nuevo tag</a>

    {{-- Buscador de tags --}}
    {!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'autocomplete' => 'off',
        'class' => 'navbar-form pull-right', 'id' => 'formSearch']) !!}
        <div class="input-group">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}

            <div class="input-group-btn">
                <button type="submit" form="formSearch" class="btn btn-default">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    {!! Form::close() !!}

    <table class="table">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Acción</th>
        </thead>

        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag) }}" class="btn btn-primary btn-xs pull-left">Editar</a>

                        {!! Form::open(['route' => ['tags.destroy', $tag], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs', 'style' => 'margin-left: 1em',
                                'onClick' => "return confirm('¿Estas seguro de eliminar el tag {$tag->name}?')"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        {{ $tags->links() }}
    </div>
@endsection
