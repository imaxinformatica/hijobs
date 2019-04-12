@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="box-result-search">
                    <form method="GET">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="state_id">Estado</label>
                                <select name="state_id">
                                    <option selected value="">Selecione</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="salary">Pretensão Salarial</label>
                                <select name="salary">
                                    <option selected value="">Selecione</option>
                                    <option value="0">À partir de R$ 0,00</option>
                                    <option value="1000">À partir de R$ 1.000,00</option>
                                    <option value="2000">À partir de R$ 2.000,00</option>
                                    <option value="3000">À partir de R$ 3.000,00</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="sex">Sexo</label>
                                <select name="sex">
                                    <option selected value="">Selecione</option>
                                    <option value="F">Feminino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="travel">Pode Viajar</label>
                                <select name="travel">
                                    <option selected value="">Selecione</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="change">Pode Mudar-se </label>
                                <select name="change">
                                    <option selected value="">Selecione</option>
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="journey_id">Jornada de Trabalho</label>
                                <select name="journey_id">
                                    <option selected value="">Selecione</option>
                                    @foreach($journeys as $journey)
                                    <option value="{{$journey->id}}">{{$journey->name}}</option>
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
                        <p class="total-vagas">215 Candidato(s)</p>
                    </div>
                </div>
                @foreach($candidates as $candidate)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <span><b>Nome: </b>{{$candidate->name}}</span>
                            <p><b>Pretensão Salarial: </b>A partir de R$ {{number_format($candidate->salary, 2, ',', '.')}}</p>
                            <p><b>Estado: </b>{{$candidate->state->name}}</p>
                            <button class="btn-result">
                                <div class="border">
                                    <img src="{{asset('images/icon-plus.png')}}">
                                </div>
                                <p>Mais detalhes do candidato</p>
                            </button>
                        </div>   
                    </div>
                </div>
                @endforeach
            </div>
        </div>        
    </div> 
</section>
@stop