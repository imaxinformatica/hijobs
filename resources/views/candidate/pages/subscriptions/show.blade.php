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
                    <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Assinatura</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                    @forelse($plans as $plan)
                        <div class="col-sm-4">
                            <p><b>Nome assinatura: </b>{{$plan->name}}</p>
                            <p><b>Valor: </b>R$ {{number_format($plan->value,2, ',','.')}}</p>
                            <p><b>Prazo gratuito: </b>20 dias</p>
                            @if(isset($candidate->transaction))
                                @if($candidate->transaction->status == 'ACTIVE')
                                <a href="{{route('company.transaction.cancel')}}" class="act-delete" >
                                    <button class="btn-red">Suspender Assinatura</button>
                                </a>
                                @elseif($candidate->transaction->status === null)
                                <a href="{{route('company.transaction.checkout')}}" >
                                    <button class="btn-blue">Finalizar Assinatura</button>
                                </a>
                                @else
                                <a href="{{route('company.transaction.cancel')}}" class="act-delete" >
                                    <button class="btn-green">Ativar Assinatura</button>
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