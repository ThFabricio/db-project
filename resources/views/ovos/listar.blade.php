@extends('layouts.app')

@section('content')
    <div id="listar_ovos">
        <div class="container">
            <div class="col-md-12 mb-4" style="border-bottom: 2px solid #B0B0B0">
                <div style="font-weight: 800; color: #081729; font-size: 2.5rem">Listar Ovos</div>
            </div>
            <div class="mt-4 py-2" style="background-color: white; border-radius: 0.5rem; border: 1px solid #B0B0B0" >
                <table class="table table-hover mb-2" style="border-radius: 1rem; background-color: white; border: none" id="table">
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
                            <td class="text-center">{{ $ovo->historico->idade_das_aves }}</td>
                            <td class="text-center">{{ $ovo->historico->setor->numero }}</td>
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
    </div>
@endsection
