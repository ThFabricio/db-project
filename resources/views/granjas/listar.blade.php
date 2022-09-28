@extends('layouts.app')

@section('content')
    <h1><center>Listar Granjas</center></h1>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <table class="table table-borderless shadow table-hover mb-2" style="border-radius: 1rem; background-color: white; border: none" id="table">
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

@endsection
