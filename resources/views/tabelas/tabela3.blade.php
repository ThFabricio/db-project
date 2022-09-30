<!-- Quantidade de Granjas que o Proprietário de nome X é dono -->

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Quantidade de Granjas</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach ($dados as $dado)
            <td>{{ $dado->qtd_granja }}</td>
        @endforeach
    </tr>
</table>
