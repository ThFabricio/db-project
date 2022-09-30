@extends('layouts.app')

@section('content')
    <h1>Visões do Banco de Dados</h1>

    <ul>
        <li><a href="{{ route('granja.visao') }}">Dados sobre a granja</a></li>
        <li><a href="{{ route('setor.visao') }}">Dados sobre o setor</a></li>
    </ul>

    <hr>

    <h3>Resultado:</h3>
    @if ($tipo_visao == 1)
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
    @elseif ($tipo_visao == 2)
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
    @endif
@endsection