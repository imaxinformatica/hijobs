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
                                    <p>3</p>
                                </div>
                                <h3>Dados da empresa</h3>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                    <form action="{{route('company.update')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="company_id" value="{{$company->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Dados da empresa</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="name">Nome Fantasia</label>
                                <input type="text" name="name" placeholder="Nome Fantasia">
                            </div>
                            <div class="col-sm-4">
                                <label for="trade">Razão Social</label>
                                <input type="text" name="trade" placeholder="Razão Social">
                            </div>
                            <div class="col-sm-4">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" class="input-phone" placeholder="Telefone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="email">E-mail</label>
                                <input type="text" value="{{$company->email}}" name="email" placeholder="E-mail">
                            </div>
                            <div class="col-sm-4">
                                <label for="password">Senha</label>
                                <input type="password" name="password" placeholder="Digite uma senha">
                            </div>
                            <div class="col-sm-4">
                                <label for="password_confirmation">Confirmação de senha</label>
                                <input type="password" name="password_confirmation" placeholder="Confirme sua senha">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="description" style="margin-top: 20px;">Breve Descrição</label>
                                <textarea name="description" placeholder="Descrição sobre a empresa"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" name="cnpj" class="input-cnpj" placeholder="CNPJ">
                            </div>
                            <div class="col-sm-6">
                                <label for="occupation_area">Área de Atuação</label>
                                <select name="occupation_area">
                                    <option selected disabled>Selecione</option>
                                    <option value="informatica">Informatica</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="cep">CEP</label>
                                <input type="text" class="input-cep"  name="cep" placeholder="Seu CEP">
                            </div>
                            <div class="col-sm-6">
                                <label for="street">Logradouro</label>
                                <input type="text" name="street" placeholder="Logradouro">
                            </div>
                            <div class="col-sm-2">
                                <label for="number">Número</label>
                                <input type="text" name="number"  placeholder="Número e Complemento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nehighbor">Bairro</label>
                                <input type="text" name="nehighbor" placeholder="Bairro">
                            </div>
                            <div class="col-sm-4">
                                <label for="state_id">Estado</label>
                                <select name="state_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}" >{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="city">Cidade</label>
                                <input type="text"  name="city" placeholder="Cidade">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Redes sociais</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" name="linkedin" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" placeholder="Informe a url do seu perfil">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="blog">Blog</label>
                                <input type="text" name="blog" placeholder="Informe a url do seu perfil">
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