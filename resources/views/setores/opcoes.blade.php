@extends('layouts.app')

@section('content')
    <h1>Setores</h1>
    <a href="{{ route('form.criar.setor') }}">Criar</a>
    <a href="{{ route('listar.setor') }}">Listar</a>
@endsection