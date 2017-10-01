@extends('admin.template.main')

@section('title', 'Listado de tags')

@section('content')
    <a href="{{ route('tags.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo tag</a>

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
