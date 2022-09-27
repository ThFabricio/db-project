@extends('layouts.app')

@section('content')
    <h1><center>Criar Setor</center></h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Criação de Setor') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('criar.setor') }}">
                            @csrf


                            <div class="row mb-3">
                                <label for="id_granja" class="col-md-4 col-form-label text-md-end">Granja</label>
                                <div class="col-md-6">
                                    <select class="form-select @error('id_granja') is-invalid @enderror" name="id_granja" id="id_granja" required>
                                    <option value="" selected>Selecione</option>
                                    @foreach($granjas as $granja)
                                        <option value="{{ $granja->id }}">{{ $granja->nome }}</option>
                                    @endforeach
                                    </select>

                                    @error('id_granja')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="numero" class="col-md-4 col-form-label text-md-end">Numero do Setor</label>

                                <div class="col-md-6">
                                    <input id="numero" type="number" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" autofocus>

                                    @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="linhagem" class="col-md-4 col-form-label text-md-end">Linhagem</label>
                                <div class="col-md-6">
                                    <input id="linhagem" type="text" class="form-control @error('linhagem') is-invalid @enderror" name="linhagem" value="{{ old('linhagem') }}" required autocomplete="linhagem">

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
                                    <input id="quantidade_de_aves" type="number" class="form-control @error('quantidade_de_aves') is-invalid @enderror" name="quantidade_de_aves" value="{{ old('quantidade_de_aves') }}" required autocomplete="quantidade_de_aves">

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
                                    <input id="nutricao" type="text" class="form-control @error('nutricao') is-invalid @enderror" name="nutricao" value="{{ old('nutricao') }}" required autocomplete="nutricao">

                                    @error('nutricao')
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
