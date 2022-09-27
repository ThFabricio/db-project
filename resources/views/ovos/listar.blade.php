@extends('layouts.app')

@section('content')
    <h1><center>Listar Ovos</center></h1>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <table class="table table-borderless shadow table-hover mb-2" style="border-radius: 1rem; background-color: white; border: none" id="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="titleColumn text-center"
                        style="cursor:pointer">Peso</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Idade das Aves</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Número do Setor</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Visualizar</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Editar</th>
                    <th scope="col"  class="titleColumn text-center"
                        style="cursor:pointer">Deletar</th>
                </tr>
                </thead>
                <tbody class="align-middle">
                @foreach($ovos as $ovo)
                    <tr>
                        <th scope="row">{{ $ovo->id }}</th>
                        <td class="text-center">{{ $ovo->peso }}</td>
                        <td class="text-center">{{ Historico::find($ovo->id_historico)->nome }}</td>
                        <td class="text-center">{{ Setor::find(Historico::find($ovo->id_historico)->id_setor)->numero }}</td>
                        <td class="text-center"><a href="{{ route('mostrar.ovo', $ovo->id) }}" class="btn btn-primary">Visualizar</a></td>
                        <td class="text-center"><a href="{{ route('form.editar.ovo', $ovo->id) }}" class="btn btn-primary">Editar</a></td>
                        <td class="text-center">
                            <form action="{{ route('deletar.ovo', $ovo->id) }}" method="POST">
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
