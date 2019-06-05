@extends('candidate.templates.default')

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
                        <div class="col-sm-3">
                            <a href="{{route('candidate.edit')}}">
                                <button class="btn-blue">Editar meu currículo</button>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{route('candidate.app')}}">
                                <button class="btn-blue">Candidaturas</button>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{route('candidate.index.message')}}">
                                <button class="btn-blue">Mensagens</button>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{route('candidate.subscriptions')}}">
                                <button class="btn-blue">Assinaturas</button>
                            </a>
                        </div>
                    </div>
                    <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
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
                            @if(isset($candidate->transaction))
                            <a href="#" >
                                <button class="btn btn-success">Plano Adquirido</button>
                            </a>
                            @else
                            <a href="#" class="act-payment" data-plan="{{$plan->code}}" data-url="{{route('candidate.transaction.generate')}}">
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