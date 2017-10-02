@extends('admin.template.main')

@section('title', 'Listado de artículos')

@section('content')
    <a href="{{ route('articles.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo artículo</a>

    {{-- Buscador de artículos --}}
    {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'autocomplete' => 'off',
        'class' => 'navbar-form pull-right', 'id' => 'formSearch']) !!}
        <div class="input-group">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}

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
            <th>Título</th>
            <th>Categoría</th>
            <th>User</th>
            <th>Acción</th>
        </thead>

        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary btn-xs pull-left">Editar</a>

                        {!! Form::open(['route' => ['articles.destroy', $article], 'method' => 'DELETE']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs', 'style' => 'margin-left: 1em',
                                'onClick' => "return confirm('¿Estas seguro de eliminar el artículo {$article->title}?')"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        {{ $articles->links() }}
    </div>
@endsection
