@extends('index.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="search curriculum">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 search-job">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h1>Cadastre o seu currículo</h1>
                            <form id="register-curriculum" method="POST" action="{{ route('candidate.store') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name" class="label-create">Nome</label>
                                        <input type="text" name="name" placeholder="Seu nome completo">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email" class="label-create">E-mail</label>
                                        <input type="email" name="email" placeholder="Seu e-mail">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cep" class="label-create">CEP</label>
                                        <input type="text" class="input-cep" name="cep" placeholder="Seu CEP">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="occupation" class="label-create">Cargo desejado</label>
                                        <input type="text" name="occupation" placeholder="Cargo desejado">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="password" class="label-create">Senha</label>
                                        <input type="password" name="password" placeholder="Digite uma senha">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="password_confirmation" class="label-create">Confirmação de senha</label>
                                        <input type="password" name="password_confirmation" placeholder="Confirme sua senha">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <button class="btn-orange">
                                            CONTINUAR
                                        </button>
                                    </div>
                                    <div class="col-sm-9">
                                        <p>Ao criar uma conta, você aceita nossa <a href="{{route('footer', ['urn' => 'politica-de-privacidade'])}}">Política de Privacidade</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
@stop