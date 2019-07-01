@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="box-result-search">
                    <form method="GET" id="filterForm">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="state">Estado</label>
                                <select name="state">
                                    <option selected value="">Selecione</option>
                                    @foreach($states as $state)
                                    <option {{request('state') == $state->sigla ? "selected" : ""}} value="{{$state->sigla}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="salary">Pretensão Salarial</label>
                                <select name="salary">
                                    <option selected value="">Selecione</option>
                                    <option {{request('salary') == 0 ? "selected" : ""}} value="0">À partir de R$ 0,00</option>
                                    <option {{request('salary') == 1000 ? "selected" : ""}} value="1000">À partir de R$ 1.000,00</option>
                                    <option {{request('salary') == 2000 ? "selected" : ""}} value="2000">À partir de R$ 2.000,00</option>
                                    <option {{request('salary') == 3000 ? "selected" : ""}} value="3000">À partir de R$ 3.000,00</option>
                                    <option {{request('salary') == 5000 ? "selected" : ""}} value="5000">À partir de R$ 5.000,00</option>
                                    <option {{request('salary') == 10000 ? "selected" : ""}} value="10000">À partir de R$ 10.000,00</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="sex">Sexo</label>
                                <select name="sex">
                                    <option selected value="">Selecione</option>
                                    <option {{request('sex') == "F" ? "selected" : ""}} value="F">Feminino</option>
                                    <option {{request('sex') == "M" ? "selected" : ""}} value="M">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="travel">Pode Viajar</label>
                                <select name="travel">
                                    <option selected value="">Selecione</option>
                                    <option {{request('travel') == "1" ? "selected" : ""}} value="1">Sim</option>
                                    <option {{request('travel') == "0" ? "selected" : ""}} value="0">Não</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="change">Pode Mudar-se </label>
                                <select name="change">
                                    <option selected value="">Selecione</option>
                                    <option {{request('change') == "1" ? "selected" : ""}} value="1">Sim</option>
                                    <option {{request('change') == "0" ? "selected" : ""}} value="0">Não</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="journey_id">Jornada de Trabalho</label>
                                <select name="journey_id">
                                    <option selected value="">Selecione</option>
                                    @foreach($journeys as $journey)
                                    <option {{request('journey_id') == $journey->id ? "selected" : ""}} value="{{$journey->id}}">{{$journey->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="contract_type_id">Tipo de contrato</label>
                                <select name="contract_type_id">
                                    <option selected value="">Selecione</option>
                                    @foreach($contract_types as $contract)
                                    <option {{request('contract_type_id') == $contract->id ? "selected" : ""}} value="{{$contract->id}}">{{$contract->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn-blue">
                                    Buscar
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn-gray clear-filters">
                                    Limpar
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
                        <p class="total-vagas">{{$candidates->count()}} Candidato(s)</p>
                    </div>
                </div>
                @foreach($candidates as $candidate)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <span><b>Nome: </b>{{$candidate->name}}</span>
                            <p><b>Pretensão Salarial: </b>A partir de R$ {{number_format($candidate->salary, 2, ',', '.')}}</p>
                            @isset($candidate->state)
                            <p><b>Estado: </b>{{$candidate->state}}</p>
                            @endisset
                            @if(Auth::guard('company')->check())
                            <?php 

                            $auth = Auth::guard('company')->user();
                            $status = ' SUSPENDED'; 
                            if ($auth) {
                                if ($auth->transaction) {
                                    $status = $auth->transaction->status;
                                }
                            }
                            ?>
                            <a href="{{route('company.cv', ['id'=> $candidate->id])}}" data-plan="{{$status}}" class="act-plan">
                                <button class="btn-result" type="button">
                                    <div class="border">
                                        <img src="{{asset('images/icon-plus.png')}}">
                                    </div>
                                    <p>Mais detalhes do candidato</p>
                                </button>
                            </a>
                            @endif
                        </div>   
                    </div>
                </div>
                @endforeach
            </div>
        </div>        
    </div> 
</section>
@stop