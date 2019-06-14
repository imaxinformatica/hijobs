@extends('candidate.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
@if(session()->has('warning'))
  <div class="container">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('warning')}}
        </div>
      </section>
    </div>
  </div>
@endisset
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
                        <div class="col-sm-6">
                            <h5>Plano:</h5>
                            <h5>Valor: R$</h5>
                        </div>
                    </div>
                    <hr>    
                    <div class="row">
                        <form action="{{route('candidate.transaction.finishCheckout')}}" id="checkout" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="token_card" value="{{$candidate->card->hash}}">
                            <input type="hidden" name="hash_comprador" value="">
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" value="{{$candidate->name}}" class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" value="{{$candidate->email}}" class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="text" name="phone" value="{{$candidate->phone}}" class="form-control input-phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" name="cep" value="{{$candidate->cep}}" class="form-control input-cep" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="street">Rua</label>
                                    <input type="text" name="street" value="{{$candidate->street}}" class="form-control" required>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="number">Número</label>
                                    <input type="text" name="number" value="{{$candidate->number}}" class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="complement">Complemento</label>
                                    <input type="text" name="complement" value="{{$candidate->complement}}" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 form-group">
                                    <label for="nehighbor">Bairro</label>
                                    <input type="text" name="nehighbor" value="{{$candidate->nehighbor}}" class="form-control" required>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="city">Cidade</label>
                                    <input type="text" name="city" value="{{$candidate->city}}" class="form-control" required>
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
                                    <input type="text" name="birthdate" value="{{$candidate->birthdate}}" class="form-control input-date" required>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" value="{{$candidate->cpf}}" class="form-control input-cpf" required>
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