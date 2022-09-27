@extends('layouts.app')

@section('content')
    <h1><center>Mostrar Usuário</center></h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Visualização do Usuário</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="id_proprietario" class="col-md-4 col-form-label text-md-end">Nome</label>
                            <div class="col-md-6">
                                {{ $usuario->nome}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">E-mail</label>

                            <div class="col-md-6">
                                {{ $usuario->email }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cnpj" class="col-md-4 col-form-label text-md-end">CPF</label>

                            <div class="col-md-6">
                                {{ $usuario->cpf}}
                            </div>
                        </div>

                        @if($usuario->proprietario)
                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">E-mail comercial</label>

                                <div class="col-md-6">
                                    {{ $usuario->proprietario->email_comercial}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">Código da lincença</label>

                                <div class="col-md-6">
                                    {{ $usuario->proprietario->codigo_licenca}}
                                </div>
                            </div>
                        @elseif($usuario->pesquisador)
                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">Universidade</label>

                                <div class="col-md-6">
                                    {{ $usuario->pesquisador->universidade }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">Supervisor</label>

                                <div class="col-md-6">
                                    @if($usuario->pesquisador->supervisor)
                                        {{ $usuario->pesquisador->supervisor->user->nome }}
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">Formações</label>

                                <div class="col-md-6">
                                    @foreach ($usuario->pesquisador->formacoes as $formacao)
                                        {{ $formacao->tipo }},
                                    @endforeach
                                </div>
                            </div>
                        @elseif($usuario->funcionario)
                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">Regime de contratação</label>

                                <div class="col-md-6">
                                    {{ $usuario->funcionario->regime_contratacao }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cnpj" class="col-md-4 col-form-label text-md-end">Salário</label>

                                <div class="col-md-6">
                                    {{ $usuario->funcionario->salario }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
