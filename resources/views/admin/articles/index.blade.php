@extends('admin.template.main')

@section('title', 'Listado de artículos')

@section('content')
    <a href="{{ route('articles.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo artículo</a>
    <h2>Listado de artículos</h2>
@endsection
