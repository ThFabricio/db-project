<!-- Nome e CPF dos Pesquisadores que não possuem supervisores -->

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $dado)    
            <tr>
                <td>{{ $dado->nome }}</td>
                <td>{{ $dado->cpf }}</td>
            </tr>
        @endforeach
</table>
