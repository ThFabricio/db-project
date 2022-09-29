@extends('layouts.app')

@section('content')
    <div id="ovos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">
                            {{ __('Mostrar Ovo')}}
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="peso" class="col-form-label">Peso do Ovo:</label>

                                <div> {{ $ovo->peso }} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="idade_aves" class="col-form-label">
                                    Idade das Aves:
                                </label>

                                <div> {{ $ovo->historico->idade_das_aves }} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="id_setor" class="col-form-label">Setor:</label>
                                <div> {{$ovo->historico->setor->numero}} </div>
                            </div>

                            <div class="">
                                {{ __('Albumen')}}
                            </div>

                            <br>

                            <div class="row mb-3">
                                <label for="pesoAlbumen" class="col-form-label">
                                    Peso do Albumen:
                                </label>
                                <div> {{$ovo->albumen->peso}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alturaAlbumen" class="col-form-label">
                                    Altura do Albumen:
                                </label>
                                <div> {{$ovo->albumen->altura}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="diametroAlbumen" class="col-form-label">
                                    Diametro do Albumen:
                                </label>
                                <div> {{$ovo->albumen->diametro}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="unidade_haugh" class="col-form-label">
                                    Unidade de Haugh:
                                </label>
                                <div> {{$ovo->albumen->unidade_haugh}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phAlbumen" class="col-form-label">
                                    PH do Albumen:
                                </label>
                                <div> {{$ovo->albumen->ph}} </div>
                            </div>

                            <div class="">
                                {{ __('Casca')}}
                            </div>

                            <br>

                            <div class="row mb-3">
                                <label for="pesoCasca" class="col-form-label">
                                    Peso da Casca:
                                </label>
                                <div> {{$ovo->casca->peso}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="corCasca" class="col-form-label">
                                    Cor da Casca:
                                </label>
                                <div> {{$ovo->casca->cor}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="espessura1" class="col-form-label">
                                    Espessura 1:
                                </label>
                                <div> {{$ovo->casca->espessura1}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="espessura2" class="col-form-label">
                                    Espessura 2:
                                </label>
                                <div> {{$ovo->casca->espessura2}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="espessura3" class="col-form-label">
                                    Espessura 3:
                                </label>
                                <div> {{$ovo->casca->espessura3}} </div>
                            </div>

                            <div class="">
                                {{ __('Gema')}}
                            </div>

                            <div class="row mb-3">
                                <label for="pesoGema" class="col-form-label">
                                    Peso da Gema:
                                </label>
                                <div> {{$ovo->gema->peso}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alturaGema" class="col-form-label">
                                    Altura da Gema:
                                </label>
                                <div> {{$ovo->gema->altura}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="diametroGema" class="col-form-label">
                                    Diametro da Gema:
                                </label>
                                <div> {{$ovo->gema->diametro}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="indiceGema" class="col-form-label">
                                    Indice da Gema
                                </label>
                                <div> {{$ovo->gema->indice}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phGema" class="col-form-label">
                                    PH da Gema:
                                </label>
                                <div> {{$ovo->gema->ph}} </div>
                            </div>

                            <div class="row mb-3">
                                <label for="corGema" class="col-form-label">
                                    Cor da Gema:
                                </label>
                                <div> {{$ovo->gema->cor}} </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
