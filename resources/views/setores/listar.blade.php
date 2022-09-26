@extends('layouts.app')

@section('content')
    <h1><center>Listar Setores</center></h1>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <table class="table table-borderless shadow table-hover mb-2" style="border-radius: 1rem; background-color: white; border: none" id="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="titleColumn text-center" >Granja</th>
                    <th scope="col" class="titleColumn text-center"
                        style="cursor:pointer">Numero do Setor</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Linhagem</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Quantidade de Aves</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Nutricao</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Visualizar</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Editar</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Deletar</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @foreach($setores as $setor)
                    <tr>
                        <th scope="row">{{ $setor->id }}</th>
                        <td class="text-center">{{ \App\Models\Granja::where('id', $setor->id_granja)->first()->nome }}</td>
                        <td class="text-center">{{ $setor->numero }}</td>
                        <td class="text-center">{{ $setor->linhagem }}</td>
                        <td class="text-center">{{ $setor->quantidade_de_aves }}</td>
                        <td class="text-center">{{ $setor->nutricao }}</td>
                        <td class="text-center"><a href="{{ route('mostrar.setor', $setor->id) }}" class="btn btn-primary">Visualizar</a></td>
                        <td class="text-center"><a href="{{ route('form.editar.setor', $setor->id) }}" class="btn btn-primary">Editar</a></td>
                        <td class="text-center">
                            <form action="{{ route('deletar.setor', $setor->id) }}" method="POST">
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


@endsection
