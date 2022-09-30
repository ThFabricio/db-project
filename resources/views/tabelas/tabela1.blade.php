<!-- Nome e CPF do Proprietário que possui a granja de CNPJ X -->

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Nome do Proprietário</th>
        <th scope="col">CPF</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach ($dados as $dado)    
            <td>{{ $dado->nome }}</td>
            <td>{{ $dado->cpf }}</td>
        @endforeach
    </tr>
</table>
