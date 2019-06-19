@extends('candidate.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="box-result-search">
                    <form method="GET" >
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name">Cargo ou área profissional</label>
                                
                                <input type="text" name="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="state_id">Estados</label>
                                <select name="state_id" id="state-search">
                                    <option selected value="">Selecione</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="city_id">Cidades</label>
                                <select name="city_id" id="city-search">
                                    <option selected value="">Selecione</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="salary">Salário desejado à partir de</label>
                                <input type="text" name="salary">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="contract_type_id">Tipo de contrato</label>
                                <select name="contract_type_id">
                                    <option selected value="">Selecione</option>
                                    @foreach($contract_types as $contract)
                                    <option value="{{$contract->id}}">{{$contract->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn-blue">
                                    Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <img class="icon-vagas" src="{{asset('images/icon-result.png')}}">
                        <p class="total-vagas">{{$opportunities->where('publish', 2)->count()}} vaga(s) de emprego</p>
                    </div>
                </div>
                @foreach($opportunities as $opportunity)
                @if($opportunity->publish == 2)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <span>{{$opportunity->name}}</span>
                            <p id="salario">@if($opportunity->salary == 0)
                                    A combinar
                                @else
                                   R$ {{number_format($opportunity->salary, 2, ',', '.')}}<p>
                                @endif
                            <p><b>{{$opportunity->num}} vaga(s)</b></p>
                            <p>{{$opportunity->activity}}.</p>
                            @if(Auth::guard('candidate')->check())
                            <?php 

                            $auth = Auth::guard('candidate')->user();
                            $status = ' SUSPENDED'; 
                            if ($auth) {
                                if ($auth->transaction) {
                                    $status = $auth->transaction->status;
                                }
                            }
                            ?>
                            <a href="{{route('candidate.show.opportunity', ['id' => $opportunity->id])}}" data-plan="{{$status}}" class="act-plan">
                                <button class="btn-result" type="button">
                                    <div class="border">
                                        <img src="{{asset('images/icon-plus.png')}}">
                                    </div>
                                    <p>Mais detalhes da vaga</p>
                                </button>
                            </a>
                            @endif
                        </div>   
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>        
    </div> 
</section>
@stop