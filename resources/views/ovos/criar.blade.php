@extends('layouts.app')

@section('content')
    <div id="ovos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">
                            {{ __('Criar Ovo')}}
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{route ('criar.ovo')}}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="peso" class="col-form-label">Peso do Ovo:</label>

                                    <input id="peso" type="number" class="form-control @error('peso')
                                        is-invalid @enderror" name="peso" value="{{ old('peso') }}"
                                           required>
                                    @error('peso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="id_historico" class="col-form-label">
                                        ID do Histórico:
                                    </label>

                                    <input id="id_historico" type="text" class="form-control
                                           @error('id_historico') is-invalid @enderror"
                                           name="id_historico" value="{{ old('id_historico') }}"
                                           required>

                                    @error('id_historico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="">
                                    {{ __('Albumen')}}
                                </div>

                                <br>

                                <div class="row mb-3">
                                    <label for="pesoAlbumen" class="col-form-label">
                                        Peso do Albumen:
                                    </label>

                                    <input id="pesoAlbumen" type="number" class="form-control
                                           @error('pesoAlbumen') is-invalid @enderror"
                                           name="pesoAlbumen" value="{{ old('pesoAlbumen') }}"
                                           required>

                                    @error('pesoAlbumen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="alturaAlbumen" class="col-form-label">
                                        Altura do Albumen:
                                    </label>

                                    <input id="alturaAlbumen" type="number" class="form-control
                                           @error('alturaAlbumen') is-invalid @enderror"
                                           name="alturaAlbumen" value="{{ old('alturaAlbumen') }}"
                                           required>

                                    @error('alturaAlbumen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="diametroAlbumen" class="col-form-label">
                                        Diametro do Albumen:
                                    </label>

                                    <input id="diametroAlbumen" type="number" class="form-control
                                           @error('diametroAlbumen') is-invalid @enderror"
                                           name="diametroAlbumen" value="{{ old('diametroAlbumen') }}"
                                           required>

                                    @error('diametroAlbumen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="unidade_haugh" class="col-form-label">
                                        Unidade de Haugh:
                                    </label>

                                    <input id="unidade_haugh" type="number" class="form-control
                                           @error('unidade_haugh') is-invalid @enderror"
                                           name="unidade_haugh" value="{{ old('unidade_haugh') }}"
                                           required>

                                    @error('unidade_haugh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="phAlbumen" class="col-form-label">
                                        PH do Albumen:
                                    </label>

                                    <input id="phAlbumen" type="number" class="form-control
                                           @error('phAlbumen') is-invalid @enderror"
                                           name="phAlbumen" value="{{ old('phAlbumen') }}"
                                           required>

                                    @error('phAlbumen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="">
                                    {{ __('Casca')}}
                                </div>

                                <br>

                                <div class="row mb-3">
                                    <label for="pesoCasca" class="col-form-label">
                                        Peso da Casca:
                                    </label>

                                    <input id="pesoCasca" type="number" class="form-control
                                           @error('pesoCasca') is-invalid @enderror"
                                           name="pesoCasca" value="{{ old('pesoCasca') }}"
                                           required>

                                    @error('pesoCasca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="corCasca" class="col-form-label">
                                        Cor da Casca:
                                    </label>

                                    <input id="corCasca" type="text" class="form-control
                                           @error('corCasca') is-invalid @enderror"
                                           name="corCasca" value="{{ old('corCasca') }}"
                                           required>

                                    @error('corCasca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="espessura1" class="col-form-label">
                                        Espessura 1:
                                    </label>

                                    <input id="espessura1" type="number" class="form-control
                                           @error('espessura1') is-invalid @enderror"
                                           name="espessura1" value="{{ old('espessura1') }}"
                                           required>

                                    @error('espessura1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="espessura2" class="col-form-label">
                                        Espessura 2:
                                    </label>

                                    <input id="espessura2" type="number" class="form-control
                                           @error('espessura2') is-invalid @enderror"
                                           name="espessura2" value="{{ old('espessura2') }}"
                                           required>

                                    @error('espessura2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="espessura3" class="col-form-label">
                                        Espessura 3:
                                    </label>

                                    <input id="espessura3" type="number" class="form-control
                                           @error('espessura3') is-invalid @enderror"
                                           name="espessura3" value="{{ old('espessura3') }}"
                                           required>

                                    @error('espessura3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="">
                                    {{ __('Gema')}}
                                </div>

                                <div class="row mb-3">
                                    <label for="pesoGema" class="col-form-label">
                                        Peso da Gema:
                                    </label>

                                    <input id="pesoGema" type="number" class="form-control
                                           @error('pesoGema') is-invalid @enderror"
                                           name="pesoGema" value="{{ old('pesoGema') }}"
                                           required>

                                    @error('PesoGema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="alturaGema" class="col-form-label">
                                        Altura da Gema:
                                    </label>

                                    <input id="alturaGema" type="number" class="form-control
                                           @error('alturaGema') is-invalid @enderror"
                                           name="alturaGema" value="{{ old('alturaGema') }}"
                                           required>

                                    @error('alturaGema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="diametroGema" class="col-form-label">
                                        Diametro da Gema:
                                    </label>

                                    <input id="diametroGema" type="number" class="form-control
                                           @error('diametroGema') is-invalid @enderror"
                                           name="diametroGema" value="{{ old('diametroGema') }}"
                                           required>

                                    @error('diametroGema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="indiceGema" class="col-form-label">
                                        Indice da Gema
                                    </label>

                                    <input id="indiceGema" type="number" class="form-control
                                           @error('indiceGema') is-invalid @enderror"
                                           name="indiceGema" value="{{ old('indiceGema') }}"
                                           required>

                                    @error('indiceGema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="phGema" class="col-form-label">
                                        PH da Gema:
                                    </label>

                                    <input id="phGema" type="number" class="form-control
                                           @error('phGema') is-invalid @enderror"
                                           name="phGema" value="{{ old('phGema') }}"
                                           required>

                                    @error('phGema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="corGema" class="col-form-label">
                                        Cor da Gema:
                                    </label>

                                    <input id="corGema" type="number" class="form-control
                                           @error('corGema') is-invalid @enderror"
                                           name="corGema" value="{{ old('corGema') }}"
                                           required>

                                    @error('corGema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Criar Ovo') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
