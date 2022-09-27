@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar Usuário</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('criar.usuario') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">Nome</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf">

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="perfil" class="col-md-4 col-form-label text-md-end">Perfil</label>

                            <div class="col-md-6">
                                <select class="form-select @error('perfil') is-invalid @enderror" name="perfil" id="perfil" aria-label="Selecione um perfil" required>
                                    <option @if(old('perfil') == "Pesquisador") selected @endif value="Pesquisador">Pesquisador</option>
                                    <option @if(old('perfil') == "Funcionário") selected @endif value="Funcionário">Funcionário</option>
                                    <option @if(old('perfil') == "Proprietário") selected @endif value="Proprietário">Proprietário</option>
                                </select>

                                @error('perfil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"> Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h3>Proprietário</h3>

                        <div class="row mb-3">
                            <label for="email_comercial" class="col-md-4 col-form-label text-md-end">E-mail comercial</label>

                            <div class="col-md-6">
                                <input id="email_comercial" type="email" class="form-control @error('email_comercial') is-invalid @enderror" name="email_comercial" value="{{ old('email_comercial') }}" autocomplete="email_comercial">

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
                                <input id="codigo_licenca" type="text" class="form-control @error('codigo_licenca') is-invalid @enderror" name="codigo_licenca" value="{{ old('codigo_licenca') }}" autocomplete="codigo_licenca">

                                @error('codigo_licenca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h3>Funcionário</h3>

                        <div class="row mb-3">
                            <label for="regime_contratacao" class="col-md-4 col-form-label text-md-end">Regime de contratação</label>

                            <div class="col-md-6">
                                <input id="regime_contratacao" type="text" class="form-control @error('regime_contratacao') is-invalid @enderror" name="regime_contratacao" value="{{ old('regime_contratacao') }}" autocomplete="regime_contratacao">

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
                                <input id="salario" type="number" class="form-control @error('salario') is-invalid @enderror" name="salario" value="{{ old('salario') }}" autocomplete="salario">

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
                                        <option @if(old('id_granja_funcionario') == $granja->id) selected @endif value={{ $granja->id }}>{{ $granja->nome }}</option>
                                    @endforeach
                                </select>

                                @error('id_granja_funcionario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h3>Pesquisador</h3>

                        <div class="row mb-3">
                            <label for="universidade" class="col-md-4 col-form-label text-md-end">Universidade</label>

                            <div class="col-md-6">
                                <input id="universidade" type="text" class="form-control @error('universidade') is-invalid @enderror" name="universidade" value="{{ old('universidade') }}" autocomplete="universidade">

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
                                <input id="formacoes" type="text" class="form-control @error('formacoes') is-invalid @enderror" name="formacoes" value="{{ old('formacoes') }}" autocomplete="formacoes">

                                @error('formacoes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_granja_pesquisador" class="col-md-4 col-form-label text-md-end">Granja</label>

                            <div class="col-md-6">
                                <select class="form-select" name="id_granja_pesquisador" id="id_granja_pesquisador" aria-label="Selecione uma granja">
                                    @foreach ($granjas as $granja)
                                        <option @if(old('id_granja_pesquisador') == $granja->id) selected @endif value={{ $granja->id }}>{{ $granja->nome }}</option>
                                    @endforeach
                                </select>

                                @error('id_granja_pesquisador')
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
                                    @foreach ($pesquisadores as $pesquisador)
                                        <option @if(old('id_pesquisador_supervisor') == $pesquisador->id) selected @endif value={{ $pesquisador->id }}>{{ $pesquisador->user->nome }}</option>
                                    @endforeach
                                </select>

                                @error('id_pesquisador_supervisor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
