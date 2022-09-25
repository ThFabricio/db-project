@extends('layouts.app')

@section('content')
    <h1><center>Criar Granja</center></h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Criação de Granja') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('criar.granja') }}">
                            @csrf


                            <div class="row mb-3">
                                <label for="id_proprietario" class="col-md-4 col-form-label text-md-end">Proprietario</label>
                                <div class="col-md-6">
                                    <select class="form-select" @error('id_proprietario') is-invalid @enderror" name="id_proprietario" id="id_proprietario" required>
                                        <option value="" selected>Selecione</option>
                                        @foreach($proprietarios as $proprietario)
                                            <option value="{{ $proprietario->id }}">{{ \App\Models\User::where('id', $proprietario->id_usuario)->first()->nome }}</option>
                                        @endforeach
                                    </select>

                                    @error('id_usuario')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="nome" class="col-md-4 col-form-label text-md-end">Nome da Granja</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">CNPJ</label>
                                <div class="col-md-6">
                                    <input id="cnpj" type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}" required autocomplete="cnpj">

                                    @error('cnpj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Criar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
