@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Passo a passo para concluir seu currículo</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="etapas box-result-search">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="number">
                                <div class="evolucao">
                                    <p>1</p>
                                </div>
                                <h3>Dados de acesso</h3>
                            </div>
                            <img src="{{asset('images/barra.png')}}">
                        </div>
                        <div class="col-sm-6">
                            <div class="number">
                                <div class="evolucao">
                                    <p>2</p>
                                </div>
                                <h3>Finalizar Cadastro</h3>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                    <form action="{{route('company.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Dados de Acesso</h4>
                            </div>
                        </div>
                       <div class="row">
                            <div class="col-sm-6">
                                <label for="name">Nome Fantasia</label>
                                <input type="text" name="name" placeholder="Nome Fantasia">
                            </div>
                            <div class="col-sm-6">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="{{$email}}" placeholder="Seu e-mail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="password">Senha</label>
                                <input type="password" name="password" placeholder="Digite uma senha">
                            </div>
                            <div class="col-sm-6">
                                <label for="password_confirmation">Confirmação de senha</label>
                                <input type="password" name="password_confirmation" placeholder="Confirme sua senha">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="btn-orange">Salvar meus dados</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </div> 
</section>

@stop