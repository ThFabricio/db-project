<!-- Lista de Proprietários e suas respectivas Granjas e Setores, listando ordenado pelo nome da Granja -->

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">CPF do Proprietário</th>
            <th scope="col">Nome da Granja</th>
            <th scope="col">Número do Setor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $dado)    
            <tr>
                <td>{{ $dado->cpf }}</td>
                <td scope="row">{{ $dado->nome }}</td>
                <td>{{ $dado->numero }}</td>
            </tr>
        @endforeach
</table>
