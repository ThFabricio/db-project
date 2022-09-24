@extends('layouts.app')

@section('content')
    <h1>Ovos</h1>
    <a href="{{ route('form.criar.ovo') }}">Criar</a>
    <a href="{{ route('listar.ovo') }}">Listar</a>
@endsection