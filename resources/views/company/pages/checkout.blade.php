@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Finalize seu plano</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Assinar Plano </h2>
                        </div>
                    </div>
                    <div class="row">
                        <form action="{{route('company.transaction.finishCheckout')}}" id="checkout" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="token_card" value="{{$company->card->hash}}">
                            <input type="hidden" name="hash_comprador" value="">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" value="{{$company->name}}" class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" value="{{$company->email}}" class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="text" name="phone" value="{{$company->phone}}" class="form-control input-phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" name="cep" value="{{$company->cep}}" class="form-control input-cep" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="street">Rua</label>
                                    <input type="text" name="street" value="{{$company->street}}" class="form-control" required>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="number">Número</label>
                                    <input type="text" name="number" value="{{$company->number}}" class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="complement">Complemento</label>
                                    <input type="text" name="complement" value="{{$company->complement}}" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 form-group">
                                    <label for="nehighbor">Bairro</label>
                                    <input type="text" name="nehighbor" value="{{$company->nehighbor}}" class="form-control" required>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="city">Cidade</label>
                                    <input type="text" name="city" value="{{$company->city}}" class="form-control" required>
                                </div>
                                <div class="col-sm-1 form-group">
                                    <label for="state">Estado</label>
                                    <select name="state" required>
                                        @foreach($states as $state)
                                        <option value="{{$state->sigla}}">{{$state->sigla}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="birthdate">Data Nascimento</label>
                                    <input type="text" name="birthdate" value="{{$company->birthdate}}" class="form-control input-date" required>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" value="{{$company->cpf}}" class="form-control input-cpf" required>
                                </div>
                            </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn-blue checkout">Assinar Plano</button>
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>        
    </div> 
</section>

@stop