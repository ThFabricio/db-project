@extends('layouts.app')

@section('content')
    <h1><center>Mostrar Granja</center></h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Visualização de Granja') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                              action="">
                            @csrf

                            <div class="row mb-3">
                                <label for="id_proprietario" class="col-md-4 col-form-label text-md-end">Proprietario</label>
                                <div class="col-md-6">
                                    <select class="form-select" name="id_proprietario" id="id_proprietario" disabled>
                                    <option value="{{\App\Models\User::where('id', \App\Models\Proprietario::where('id', $granja->id_proprietario)->first()->id_usuario)->first()->nome}}" selected>{{\App\Models\User::where('id', \App\Models\Proprietario::where('id', $granja->id_proprietario)->first()->id_usuario)->first()->nome}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nome" class="col-md-4 col-form-label text-md-end">Nome da Granja</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $granja->nome }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">CNPJ</label>

                                <div class="col-md-6">
                                    <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ $granja->cnpj }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">Localizações</label>

                                <div class="col-md-6">
                                    @foreach ($granja->localizacao as $localizacao)
                                    <input type="text" class="form-control" value="{{ $localizacao->endereco }}" disabled>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">Tipos de criação</label>

                                <div class="col-md-6">
                                    @foreach ($granja->tipoCriacao as $tipoCriacao)
                                    <input type="text" class="form-control" value="{{ $tipoCriacao->tipo }}" disabled>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection
