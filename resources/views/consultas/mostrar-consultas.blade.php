@extends('layouts.app')

@section('content')
    <h1>Consultas</h1>

    <ul>
        <li><a href="#">Selecione o nome e cpf do Proprietário que possui a granja de cnpj X</a></li>
        <li><a href="#">Selecione o email comercial do Proprietario dono da Granja que o Funcionário de cpf X trabalha</a></li>
        <li><a href="#">Selecione a quantidade de Granjas que o Proprietário de nome X é dono</a></li>
        <li><a href="#">Selecione os distintos salários pagos para os Funcionários da Granja de cnpj X</a></li>
        <li><a href="#">Para cada Granja, obter o cnpj da Granja, o número de Funcionários e a média salarial</a></li>
        <li><a href="#">Selecione o nome e o cpf dos Pesquisadores que não possuem supervisores</a></li>
        <li><a href="#">Selecione a quantidade de Ovos, com peso maior que X gramas, que foram cadastrados na Granja do Pesquisador de nome X</a></li>
        <li><a href="#">Selecione o número de universidades distintas de Pesquisadores</a></li>
        <li><a href="#">Obter uma lista de Proprietários e suas respectivas Granjas e Setores, listando ordenado pelo nome da Granja</a></li>
        <li><a href="#">Obter a contagem de funcionários da granja de cnjp X que possuem salário entre 1000 e 5000</a></li>
    </ul>

    <hr>

    <h3>Resultado:</h3>
@endsection