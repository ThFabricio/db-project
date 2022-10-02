@extends('layouts.app')

@section('content')
    <div class="col-md-12 mb-4" style="border-bottom: 2px solid #B0B0B0">
        <div style="font-weight: 800; color: #081729; font-size: 2.5rem">Visões</div>
    </div>

    <div class="col-md-12 mb-4" style="background-color: #C2C2C2; border-radius: 1rem">
        <div class="row justify-content-between mx-3 py-3">
            <div class="col-md-5 px-3 py-2" style="background-color: white; border-radius: 0.5rem">
                <a href="{{ route('granja.visao') }}" style="color: #081729">Dados sobre a granja</a>
            </div>
            <div class="col-md-5 px-3 py-2" style="background-color: white; border-radius: 0.5rem">
                <a href="{{ route('setor.visao') }}" style="color: #081729">Dados sobre o setor</a></li>
            </div>
        </div>
    </div>

    @if ($tipo_visao == 1)
        <div class="mt-4 py-2" style="background-color: white; border-radius: 0.5rem; border: 1px solid #B0B0B0" >
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome da Granja</th>
                    <th scope="col">Quantidade de Setores</th>
                    <th scope="col">Quantidade de Funcionários</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($dados as $dado)
                    <tr>
                        <td>{{ $dado->nome_granja }}</td>
                        <td>{{ $dado->qtd_setores }}</td>
                        <td>{{ $dado->qtd_funcionarios }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @elseif ($tipo_visao == 2)
        <div class="mt-4 py-2" style="background-color: white; border-radius: 0.5rem; border: 1px solid #B0B0B0" >
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Número do Setor</th>
                    <th scope="col">Quantidade de Ovos</th>
                    <th scope="col">Média Peso dos Ovos</th>
                    <th scope="col">Média Idade das Aves</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($dados as $dado)
                    <tr>
                        <td>{{ $dado->numero_setor }}</td>
                        <td>{{ $dado->qtd_ovos }}</td>
                        <td>{{ $dado->media_peso_ovos }}</td>
                        <td>{{ $dado->media_idade_das_aves }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
@endsection
