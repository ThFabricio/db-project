<!-- Contagem de funcionários da granja de cnjp X que possuem salário entre 1000 e 5000 -->

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Quantidade de funcionarios</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dados as $dado)    
            <tr>
                <td>{{ $dado->qtd }}</td>
            </tr>
        @endforeach
</table>
