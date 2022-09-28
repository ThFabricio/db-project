@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuário</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editar.usuario', $user->id) }}">
                        @csrf
                        @method("PUT")

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') ?? $user->nome }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cpf" class="col-md-4 col-form-label text-md-end">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') ?? $user->cpf }}" required autocomplete="cpf">

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if($user->proprietario)
                            <hr>

                            <div class="row mb-3">
                                <label for="email_comercial" class="col-md-4 col-form-label text-md-end">E-mail comercial</label>

                                <div class="col-md-6">
                                    <input id="email_comercial" type="email" class="form-control @error('email_comercial') is-invalid @enderror" name="email_comercial" value="{{ old('email_comercial') ?? $user->proprietario->email_comercial }}" autocomplete="email_comercial">

                                    @error('email_comercial')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="codigo_licenca" class="col-md-4 col-form-label text-md-end">Código de licença</label>

                                <div class="col-md-6">
                                    <input id="codigo_licenca" type="text" class="form-control @error('codigo_licenca') is-invalid @enderror" name="codigo_licenca" value="{{ old('codigo_licenca') ?? $user->proprietario->codigo_licenca }}" autocomplete="codigo_licenca">

                                    @error('codigo_licenca')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @elseif($user->funcionario)
                            <hr>

                            <div class="row mb-3">
                                <label for="regime_contratacao" class="col-md-4 col-form-label text-md-end">Regime de contratação</label>

                                <div class="col-md-6">
                                    <input id="regime_contratacao" type="text" class="form-control @error('regime_contratacao') is-invalid @enderror" name="regime_contratacao" value="{{ old('regime_contratacao') ?? $user->funcionario->regime_contratacao }}" autocomplete="regime_contratacao">

                                    @error('regime_contratacao')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="salario" class="col-md-4 col-form-label text-md-end">Salário</label>

                                <div class="col-md-6">
                                    <input id="salario" type="number" class="form-control @error('salario') is-invalid @enderror" name="salario" value="{{ old('salario') ?? $user->funcionario->salario }}" autocomplete="salario">

                                    @error('salario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="id_granja_funcionario" class="col-md-4 col-form-label text-md-end">Granja</label>

                                <div class="col-md-6">
                                    <select class="form-select" name="id_granja_funcionario" id="id_granja_funcionario" aria-label="Selecione uma granja">
                                        @foreach ($granjas as $granja)
                                            <option @if(old('id_granja_funcionario') == $granja->id || $user->funcionario->id_granja == $granja->id) selected @endif value={{ $granja->id }}>{{ $granja->nome }}</option>
                                        @endforeach
                                    </select>

                                    @error('id_granja_funcionario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @elseif($user->pesquisador)
                            <hr>
    
                            <div class="row mb-3">
                                <label for="universidade" class="col-md-4 col-form-label text-md-end">Universidade</label>
    
                                <div class="col-md-6">
                                    <input id="universidade" type="text" class="form-control @error('universidade') is-invalid @enderror" name="universidade" value="{{ old('universidade') ?? $user->pesquisador->universidade }}" autocomplete="universidade">
    
                                    @error('universidade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="formacoes" class="col-md-4 col-form-label text-md-end">Formações (separe por ;)</label>
    
                                <div class="col-md-6">
                                    @php
                                        $formacoes = $user->pesquisador->formacoes;
                                        $formacoes_txt = "";
                                        foreach ($formacoes as $key => $formacao) {
                                            if ($key == count($formacoes) - 1) {
                                                $formacoes_txt = $formacoes_txt . $formacao->tipo;
                                            } else {
                                                $formacoes_txt = $formacoes_txt . $formacao->tipo . "; ";
                                            }
                                        }
                                    @endphp
                                    <input id="formacoes" type="text" class="form-control @error('formacoes') is-invalid @enderror" name="formacoes" value="{{ old('formacoes') ?? $formacoes_txt }}" autocomplete="formacoes">
    
                                    @error('formacoes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="cnpj_granja_pesquisador" class="col-md-4 col-form-label text-md-end">Granja (digite o CNPJ separado por ;)</label>
    
                                <div class="col-md-6">
                                    @php
                                        $granjas = $user->pesquisador->granjas;
                                        $granjas_txt = "";
                                        foreach ($granjas as $key => $granja) {
                                            if ($key == count($granjas) - 1) {
                                                $granjas_txt = $granjas_txt . $granja->cnpj;
                                            } else {
                                                $granjas_txt = $granjas_txt . $granja->cnpj . "; ";
                                            }
                                        }
                                    @endphp
                                    <input id="cnpj_granja_pesquisador" type="text" class="form-control @error('cnpj_granja_pesquisador') is-invalid @enderror" name="cnpj_granja_pesquisador" value="{{ old('cnpj_granja_pesquisador') ?? $granjas_txt }}" autocomplete="cnpj_granja_pesquisador">
    
                                    @error('cnpj_granja_pesquisador')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="id_pesquisador_supervisor" class="col-md-4 col-form-label text-md-end">Pesquisador supervisor</label>
    
                                <div class="col-md-6">
                                    <select class="form-select" name="id_pesquisador_supervisor" id="id_pesquisador_supervisor" aria-label="Selecione uma granja">
                                        <option @if(old('id_pesquisador_supervisor') == null || $user->pesquisador->id_pesquisador_supervisor == null) selected @endif value="null">Sem pesquisador</option>
                                        @foreach ($pesquisadores as $pesquisador)
                                            @if ($pesquisador->id != $user->pesquisador->id)
                                                <option @if(old('id_pesquisador_supervisor') == $pesquisador->id || $user->pesquisador->id_pesquisador_supervisor == $pesquisador->id) selected @endif value="{{ $pesquisador->id }}">{{ $pesquisador->user->nome }}</option>
                                            @endif
                                        @endforeach
                                    </select>
    
                                    @error('id_pesquisador_supervisor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
