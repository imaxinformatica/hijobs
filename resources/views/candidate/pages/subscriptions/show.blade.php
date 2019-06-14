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
                                <button class="btn-blue-dark">Assinaturas</button>
                            </a>
                        </div>
                    </div>
                    <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Assinaturas</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                    @forelse($plans as $plan)
                        <div class="col-sm-4">
                            <p for="name"><b>Nome assinatura: </b>{{$plan->name}}</p>
                            <p for="name"><b>Valor: </b>R$ {{number_format($plan->value,2, ',','.')}}</p>
                            @if(isset($candidate->transaction))
                                @if($candidate->transaction->status == 'ACTIVE')
                                <a href="{{route('company.transaction.cancel')}}" class="act-delete" >
                                    <button class="btn btn-danger">Suspender Assinatura</button>
                                </a>
                                @else
                                <a href="{{route('company.transaction.cancel')}}" class="act-delete" >
                                    <button class="btn btn-success">Ativar Assinatura</button>
                                </a>
                                @endif
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