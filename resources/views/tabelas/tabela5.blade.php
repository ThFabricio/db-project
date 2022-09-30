<!-- Para cada Granja, obter o cnpj da Granja, o número de Funcionários e a média salarial -->

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">CNPJ</th>
        <th scope="col">Quantidade de funcionários</th>
        <th scope="col">Média salarial</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dados as $dado)
            <tr>
                <td>{{ $dado->cnpj }}</td>
                <td>{{ $dado->qtd_func }}</td>
                <td>{{ $dado->media_salario }}</td>
            </tr>
        @endforeach
</table>
