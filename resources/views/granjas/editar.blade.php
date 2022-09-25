@extends('layouts.app')

@section('content')
    <h1><center>Editar Granja</center></h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Granja') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('editar.granja', $granja->id) }}">
                            @method('PUT')
                            @csrf


                            <div class="row mb-3">
                                <label for="id_proprietario" class="col-md-4 col-form-label text-md-end">Proprietario</label>
                                <div class="col-md-6">
                                    <select class="form-select" @error('id_proprietario') is-invalid @enderror" name="id_proprietario" id="id_proprietario" required>
                                    <option value="{{$granja->id_proprietario}}">{{\App\Models\User::where('id', \App\Models\Proprietario::where('id', $granja->id_proprietario)->first()->id_usuario)->first()->nome }}</option>
                                    @foreach($proprietarios as $proprietario)
                                        @if($proprietario->id != $granja->id_proprietario)
                                            <option value="{{ $proprietario->id }}">{{ \App\Models\User::where('id', $proprietario->id_usuario)->first()->nome }}</option>
                                        @endif
                                        @endforeach
                                        </select>

                                        @error('id_proprietario')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="nome" class="col-md-4 col-form-label text-md-end">Nome da Granja</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $granja->nome }}" required>

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
                                    <input id="cnpj" type="text" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ $granja->cnpj }}" required autocomplete="cnpj">

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
                                        {{ __('Editar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
