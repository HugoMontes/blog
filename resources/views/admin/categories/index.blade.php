@extends('admin.template.main')

@section('title', 'Listado de categorías')

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nueva categoría</a>

    <table class="table">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Acción</th>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-xs pull-left">Editar</a>

                        {!! Form::open(['route' => ['categories.destroy', $category], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs', 'style' => 'margin-left: 1em',
                                'onClick' => "return confirm('¿Estas seguro de eliminar la categoría?')"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        {{ $categories->links() }}
    </div>
@endsection
