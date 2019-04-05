@extends('candidate.templates.default')

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
                            <form id="register-curriculum">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name">Nome</label>
                                        <input type="text" name="name" placeholder="Seu nome completo">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email">E-mail</label>
                                        <input type="email" name="email" placeholder="Seu e-mail">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cep">CEP</label>
                                        <input type="text" name="cep" placeholder="Seu CEP">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="cargo">Cargo desejado</label>
                                        <input type="text" name="cargo" placeholder="Cargo desejado">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="password">Senha</label>
                                        <input type="password" name="password" placeholder="Digite uma senha">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="confirmation">Confirmação de senha</label>
                                        <input type="password" name="confirmation" placeholder="Confirme sua senha">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <button class="btn-orange">
                                            CONTINUAR
                                        </button>
                                    </div>
                                    <div class="col-sm-9">
                                        <p>Ao criar uma conta, você aceita nossa <a href="#">Política de Privacidade</a></p>
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