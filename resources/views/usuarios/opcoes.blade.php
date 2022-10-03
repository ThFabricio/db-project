@extends('layouts.app')

@section('content')
    <div class="col-md-12 mb-4" style="border-bottom: 2px solid #B0B0B0">
        <div style="font-weight: 800; color: #081729; font-size: 2.5rem">Usuários</div>
    </div>
    <a href="{{ route('criar.usuario') }}">Criar</a>
    <a href="{{ route('listar.usuario') }}">Listar</a>
@endsection
