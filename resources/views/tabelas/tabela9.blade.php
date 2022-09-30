<!-- Número de universidades distintas de Pesquisadores -->

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Quantidade de universidades distintas</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($dados as $dado)    
            <tr>
                <th scope="row">{{ $dado->qtd }}</th>
            </tr>
        @endforeach
</table>
