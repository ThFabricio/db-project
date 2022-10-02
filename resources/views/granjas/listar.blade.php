@extends('layouts.app')

@section('content')
    <div id="listar_granja">
        <div class="container">
            <div class="col-md-12 mb-4" style="border-bottom: 2px solid #B0B0B0">
                <div style="font-weight: 800; color: #081729; font-size: 2.5rem">Listar Granjas</div>
            </div>
            <div class="mt-4 py-2" style="background-color: white; border-radius: 0.5rem; border: 1px solid #B0B0B0" >
                <table class="table table-hover mb-2" style="border-radius: 1rem; background-color: white; border: none" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="titleColumn text-center" >Proprietario</th>
                        <th scope="col" class="titleColumn text-center"
                            style="cursor:pointer">Nome da Granja</th>
                        <th scope="col"  class="titleColumn text-center"
                            style="cursor:pointer">CNPJ</th>
                        <th scope="col"  class="titleColumn text-center"
                            style="cursor:pointer">Visualizar</th>
                        <th scope="col"  class="titleColumn text-center"
                            style="cursor:pointer">Editar</th>
                        <th scope="col"  class="titleColumn text-center"
                            style="cursor:pointer">Deletar</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @foreach($granjas as $granja)
                        <tr>
                            <th scope="row">{{ $granja->id }}</th>
                            <td class="text-center">@if($granja->proprietario != null && $granja->proprietario->user != null) {{$granja->proprietario->user->nome}} @endif</td>
                            <td class="text-center">{{ $granja->nome }}</td>
                            <td class="text-center">{{ $granja->cnpj }}</td>
                            <td class="text-center"><a href="{{ route('mostrar.granja', $granja->id) }}" class="btn btn-primary">Visualizar</a></td>
                            <td class="text-center"><a href="{{ route('form.editar.granja', $granja->id) }}" class="btn btn-primary">Editar</a></td>
                            <td class="text-center">
                                <form action="{{ route('deletar.granja', $granja->id) }}" method="POST">
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
