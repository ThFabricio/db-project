<!-- Distintos salários pagos para os Funcionários da Granja de CNPJ X -->

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Salários</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach ($dados as $dado)
            <td>{{ $dado->salario }}</td>
        @endforeach
    </tr>
</table>
