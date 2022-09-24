@extends('layouts.app')

@section('content')
    <h1>Granjas</h1>
    <a href="{{ route('form.criar.granja') }}">Criar</a>
    <a href="{{ route('listar.granja') }}">Listar</a>
@endsection