@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Planos</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                    <div class="row">
                            <div class="col-sm-4">
                                <a href="{{route('company.index.message')}}">
                                    <button type="button" class="btn-blue">Mensagens Enviadas</button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="{{route('company.subscriptions')}}">
                                    <button type="button" class="btn-blue">Assinaturas</button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="{{route('opportunity.index')}}">
                                    <button type="button" class="btn-blue">Voltar</button>
                                </a>
                            </div>
                        </div>
                    <input type="hidden" name="company_id" value="{{$company->id}}">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Planos</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                    @forelse($plans as $plan)
                        <div class="col-sm-4">
                            <p for="name"><b>Nome: </b>{{$plan->name}}</p>
                            <p for="name"><b>Valor: </b>R$ {{number_format($plan->value,2, ',','.')}}</p>
                            @if(isset($company->transaction))
                            <a href="#" >
                                <button class="btn btn-success">Plano Adquirido</button>
                            </a>
                            @else
                            <a href="#" class="act-payment" data-plan="{{$plan->code}}" data-url="{{route('company.transaction.generate')}}">
                                <button class="btn-blue">Assinar Plano</button>
                            </a>
                            @endif
                        </div>
                        
                    @empty
                        <div class="col-sm-12">
                            <p>Não Existem planos cadastrados</p>
                        </div>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>        
    </div> 
</section>

@stop