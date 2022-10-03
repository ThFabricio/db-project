<!-- Quantidade de Ovos, com peso maior que X gramas, que foram cadastrados na Granja do Pesquisador de nome Y -->

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Quantidade de ovos</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dados as $dado)    
            <tr>
                <td>{{ $dado->qtd }}</td>
            </tr>
        @endforeach
</table>
