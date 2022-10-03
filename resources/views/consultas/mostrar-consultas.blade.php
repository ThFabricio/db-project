@extends('layouts.app')

@section('content')

    <div id="consultas">
        <div class="container">
            <div class="col-md-12 mb-4" style="border-bottom: 2px solid #B0B0B0">
                <div style="font-weight: 800; color: #081729; font-size: 2.5rem">Consultas</div>
            </div>

            <form method="GET" action="{{ route('realizar.consulta') }}">
                <div class="col-md-12" style="background-color: #C2C2C2; border-radius: 1rem">
                    <div class="row justify-content-between mx-3 py-3">
                        <div class="col-md-6 px-0" style="background-color: white; border-radius: 0.5rem">
                            <select id="consulta" name="consulta" class="form-select" aria-label="Default select example" style="background-color: transparent; border: none">
                                <option selected>Selecione a consulta que você deseja realizar</option>
                                <option value="1">Nome e CPF do Proprietário que possui a granja de CNPJ X</option>
                                <option value="2">Email comercial do Proprietario dono da Granja que o Funcionário de CPF X trabalha</option>
                                <option value="3">Quantidade de Granjas que o Proprietário de nome X é dono</option>
                                <option value="4">Distintos salários pagos para os Funcionários da Granja de CNPJ X</option>
                                <option value="5">Para cada Granja, obter o cnpj da Granja, o número de Funcionários e a média salarial</option>
                                <option value="6">Nome e CPF dos Pesquisadores que não possuem supervisores</option>
                                <option value="7">Quantidade de Ovos, com peso maior que X gramas, que foram cadastrados na Granja do Pesquisador de nome Y</option>
                                <option value="8">Lista de Proprietários e suas respectivas Granjas e Setores, listando ordenado pelo nome da Granja</option>
                                <option value="9">Número de universidades distintas de Pesquisadores</option>
                                <option value="10">Contagem de funcionários da granja de cnjp X que possuem salário entre 1000 e 5000</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <input type="text" class="form-control" id="input1" name="input1" style="background-color: white">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <input type="text" class="form-control" id="input2" name="input2" style="background-color: white">
                            </div>
                        </div>
                        <div class="col-md-1" >
                            <button type="submit" class="btn">
                                <img src="{{asset('images/Group77.svg')}}" alt="" width="62%">
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="mt-4 py-2" style="background-color: white; border-radius: 0.5rem; border: 1px solid #B0B0B0" >
                @if ($consulta == 1)
                    @include('tabelas.tabela1', $dados)
                @elseif ($consulta == 2)
                    @include('tabelas.tabela2', $dados)
                @elseif ($consulta == 3)
                    @include('tabelas.tabela3', $dados)
                @elseif($consulta == 4)
                    @include('tabelas.tabela4', $dados)
                @elseif($consulta == 5)
                    @include('tabelas.tabela5', $dados)
                @elseif($consulta == 6)
                    @include('tabelas.tabela6', $dados)
                @elseif($consulta == 7)
                    @include('tabelas.tabela7', $dados)
                @elseif($consulta == 8)
                    @include('tabelas.tabela8', $dados)
                @elseif($consulta == 9)
                    @include('tabelas.tabela9', $dados)
                @elseif($consulta == 10)
                    @include('tabelas.tabela10', $dados)
                @endif
            </div>
        </div>
    </div>

@endsection
