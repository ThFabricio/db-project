@extends('layouts.app')

@section('content')
    <div id="listar_user">
        <div class="container">
            <div class="col-md-12 mb-4" style="border-bottom: 2px solid #B0B0B0">
                <div style="font-weight: 800; color: #081729; font-size: 2.5rem">Listar Usuários</div>
            </div>
            <div class="mt-4 py-2" style="background-color: white; border-radius: 0.5rem; border: 1px solid #B0B0B0" >
                <table class="table table-hover mb-2" style="border-radius: 1rem; background-color: white; border: none" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="titleColumn text-center" >
                            Nome
                        </th>
                        <th scope="col" class="titleColumn text-center" style="cursor:pointer">
                            E-mail
                        </th>
                        <th scope="col"  class="titleColumn text-center" style="cursor:pointer">
                            CPF
                        </th>
                        <th scope="col"  class="titleColumn text-center" style="cursor:pointer">
                            Perfil
                        </th>
                        <th scope="col"  class="titleColumn text-center" style="cursor:pointer">
                            Visualizar
                        </th>
                        <th scope="col"  class="titleColumn text-center" style="cursor:pointer">
                            Editar
                        </th>
                        <th scope="col"  class="titleColumn text-center" style="cursor:pointer">
                            Deletar
                        </th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @foreach($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{ $usuario->id }}</th>
                            <td class="text-center">{{ $usuario->nome }}</td>
                            <td class="text-center">{{ $usuario->email }}</td>
                            <td class="text-center">{{ $usuario->cpf }}</td>
                            @if($usuario->proprietario)
                                <td class="text-center">Proprietário</td>
                            @elseif($usuario->pesquisador)
                                <td class="text-center">Pesquisador</td>
                            @elseif($usuario->funcionario)
                                <td class="text-center">Funcionário</td>
                            @else
                                <td class="text-center">Indefinido</td>
                            @endif
                            <td class="text-center"><a href="{{ route('mostrar.usuario', $usuario->id) }}" class="btn btn-primary">Visualizar</a></td>
                            <td class="text-center"><a href="{{ route('form.editar.usuario', $usuario->id) }}" class="btn btn-primary">Editar</a></td>
                            <td class="text-center">
                                <form action="{{ route('deletar.usuario', $usuario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
