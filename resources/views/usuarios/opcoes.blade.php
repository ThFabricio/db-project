@extends('layouts.app')

@section('content')
    <h1>Usuários</h1>
    <a href="{{ route('criar.usuario') }}">Criar</a>
    <a href="{{ route('listar.usuario') }}">Listar</a>
@endsection