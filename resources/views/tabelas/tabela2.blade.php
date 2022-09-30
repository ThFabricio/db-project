<!-- Email comercial do Proprietario dono da Granja que o Funcionário de CPF X trabalha -->

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">E-mail comercial do proprietário</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach ($dados as $dado)
            <td>{{ $dado->email_comercial }}</td>
        @endforeach
    </tr>
</table>
