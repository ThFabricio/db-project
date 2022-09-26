@extends('layouts.app')

@section('content')
    <h1><center>Mostrar Setor</center></h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Visualização de Setor') }}</div>

                    <div class="card-body">
                        <form method="GET" enctype="multipart/form-data" id="formRequisicao"
                              action="">
                            @csrf

                            <div class="row mb-3">
                                <label for="id_proprietario" class="col-md-4 col-form-label text-md-end">Granja</label>
                                <div class="col-md-6">
                                    <select class="form-select" name="id_granja" id="id_granja" disabled>
                                        <option value="{{ \App\Models\Granja::where('id', $setor->id_granja)->first()->nome }}" selected>{{\App\Models\Granja::where('id', $setor->id_granja)->first()->nome}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nome" class="col-md-4 col-form-label text-md-end">Numero</label>

                                <div class="col-md-6">
                                    <input id="numero" type="number" class="form-control" name="numero" value="{{ $setor->numero }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="linhagem" class="col-md-4 col-form-label text-md-end">Linhagem</label>
                                <div class="col-md-6">
                                    <input id="linhagem" type="text" class="form-control @error('linhagem') is-invalid @enderror" name="linhagem" value="{{ $setor->linhagem}}" disabled>

                                    @error('linhagem')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="quantidade_de_aves" class="col-md-4 col-form-label text-md-end">Quantidade de Aves</label>
                                <div class="col-md-6">
                                    <input id="quantidade_de_aves" type="number" class="form-control @error('quantidade_de_aves') is-invalid @enderror" name="quantidade_de_aves" value="{{ $setor->quantidade_de_aves }}" disabled>

                                    @error('quantidade_de_aves')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nutricao" class="col-md-4 col-form-label text-md-end">Nutricao</label>
                                <div class="col-md-6">
                                    <input id="nutricao" type="text" class="form-control @error('nutricao') is-invalid @enderror" name="nutricao" value="{{$setor->nutricao}}" disabled>

                                    @error('nutricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


@endsection
