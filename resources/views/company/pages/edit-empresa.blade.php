@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Editar Currículo</h1>
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
                                <input type="text" name="name" value="{{$company->name}}" placeholder="Nome Fantasia">
                            </div>
                            <div class="col-sm-4">
                                <label for="trade">Razão Social</label>
                                <input type="text" name="trade" value="{{$company->trade}}" placeholder="Razão Social">
                            </div>
                            <div class="col-sm-4">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" value="{{$company->phone}}" class="input-phone" placeholder="Telefone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="{{$company->email}}" placeholder="E-mail">
                            </div>
                            <div class="col-sm-6">
                                <a class="act-password">
                                    <button class="btn-orange" type="button" class="act-password">Alterar a Senha</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="description" style="margin-top: 20px;">Breve Descrição</label>
                                <textarea name="description" placeholder="Descrição sobre a empresa">{{$company->description}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" name="cnpj" value="{{$company->cnpj}}" class="input-cnpj" placeholder="CNPJ">
                            </div>
                            <div class="col-sm-6">
                                <label for="occupation_area_id">Área de Atuação</label>
                                <select name="occupation_area_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($occupations as $occupation)
                                    <option value="{{$occupation->id}}" <?php if ($company->occupation_area_id == $occupation->id): echo "selected"; ?>
                                    <?php endif ?>>{{$occupation->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="cep">CEP</label>
                                <input type="text" class="input-cep" value="{{$company->cep}}"  name="cep" placeholder="Seu CEP">
                            </div>
                            <div class="col-sm-6">
                                <label for="street">Logradouro / Rua</label>
                                <input type="text" name="street" value="{{$company->street}}" placeholder="Logradouro">
                            </div>
                            <div class="col-sm-2">
                                <label for="number">Número</label>
                                <input type="text" name="number" value="{{$company->number}}"  placeholder="Número / Complemento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="neighborhood">Bairro</label>
                                <input type="text" name="neighborhood" value="{{$company->neighborhood}}" placeholder="Bairro">
                            </div>
                            <div class="col-sm-4">
                                <label for="state">Estado</label>
                                <input type="text"  name="state" value="{{$company->state}}" placeholder="Estado">
                            </div>
                            <div class="col-sm-4">
                                <label for="city">Cidade</label>
                                <input type="text"  name="city" value="{{$company->city}}" placeholder="Cidade">
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
                                <input type="text" name="linkedin" value="{{$company->linkedin}}" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" value="{{$company->facebook}}" placeholder="Informe a url do seu perfil">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" value="{{$company->twitter}}" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="blog">Blog</label>
                                <input type="text" name="blog" value="{{$company->blog}}" placeholder="Informe a url do seu perfil">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="btn-orange">Editar meu cadastro</button>
                            </div>
                            <div class="col-sm-4">
                                <a href="{{route('company.index.message')}}">
                                    <button type="button" class="btn-orange">Mensagens Enviadas</button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="{{route('opportunity.index')}}">
                                    <button type="button" class="btn-orange">Voltar</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </div> 
</section>

@stop