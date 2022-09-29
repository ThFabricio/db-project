@extends('layouts.app')

@section('content')
    <div id="ovos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">
                            {{ __('Editar Ovo')}}
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('editar.ovo', $ovo->id) }}">
                                @method('PUT')
                                @csrf

                                <div class="row mb-3">
                                    <label for="peso" class="col-form-label">Peso do Ovo:</label>

                                    <input id="peso" type="number" class="form-control @error('peso')
                                        is-invalid @enderror" name="peso" value="{{ old('peso') ?? $ovo->peso}}"
                                           required>
                                    @error('peso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="idade_das_aves" class="col-form-label">
                                        Idade das Aves:
                                    </label>

                                    <input id="idade_das_aves" type="number" class="form-control
                                           @error('idade_das_aves') is-invalid @enderror"
                                           name="idade_das_aves" value="{{ old('idade_das_aves') ?? $ovo->historico->idade_das_aves}}"
                                           required>

                                    @error('idade_das_aves')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label for="id_setor" class="col-md-4 col-form-label text-md-end">Setor:</label>
                                    <div class="col-md-6">
                                        <select id="id_setor" class="form-select @error('id_setor') is-invalid @enderror" name="id_setor" id="id_setor" required>
                                            <option value="" selected>Selecione</option>
                                            @foreach($setores as $setor)
                                                <option @if($setor->id == $ovo->historico->setor->id) selected @endif value="{{ $setor->id }}">{{ $setor->numero }}</option>
                                            @endforeach
                                        </select>


                                        @error('id_setor')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
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
                                           name="pesoAlbumen" value="{{ old('pesoAlbumen') ?? $ovo->albumen->peso }}"
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
                                           name="alturaAlbumen" value="{{ old('alturaAlbumen') ?? $ovo->albumen->altura}}"
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
                                           name="diametroAlbumen" value="{{ old('diametroAlbumen') ?? $ovo->albumen->diametro}}"
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
                                           name="unidade_haugh" value="{{ old('unidade_haugh') ?? $ovo->albumen->unidade_haugh}}"
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
                                           name="phAlbumen" value="{{ old('phAlbumen') ?? $ovo->albumen->ph }}"
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
                                           name="pesoCasca" value="{{ old('pesoCasca') ?? $ovo->casca->peso }}"
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
                                           name="corCasca" value="{{ old('corCasca') ?? $ovo->casca->cor }}"
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
                                           name="espessura1" value="{{ old('espessura1') ?? $ovo->casca->espessura1 }}"
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
                                           name="espessura2" value="{{ old('espessura2') ?? $ovo->casca->espessura2 }}"
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
                                           name="espessura3" value="{{ old('espessura3') ?? $ovo->casca->espessura3 }}"
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
                                           name="pesoGema" value="{{ old('pesoGema') ?? $ovo->gema->peso }}"
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
                                           name="alturaGema" value="{{ old('alturaGema') ?? $ovo->gema->altura }}"
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
                                           name="diametroGema" value="{{ old('diametroGema') ?? $ovo->gema->diametro }}"
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
                                           name="indiceGema" value="{{ old('indiceGema') ?? $ovo->gema->indice }}"
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
                                           name="phGema" value="{{ old('phGema') ?? $ovo->gema->ph }}"
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
                                           name="corGema" value="{{ old('corGema') ?? $ovo->gema->cor }}"
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
                                            {{ __('Editar Ovo') }}
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
