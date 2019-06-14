@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="box-result-search">
                    <?php 

                    $auth = Auth::guard('company')->user();
                    $status = ' SUSPENDED'; 
                    if ($auth) {
                        if ($auth->transaction) {
                            $status = $auth->transaction->status;
                        }
                    }
                    ?>
                    <a href="{{route('opportunity.create')}}" data-plan="{{$status}}" class="act-plan">
                        <button class="btn-blue">
                            <p>Criar vaga</p>
                        </button>
                    </a>
                    <form method="GET">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name">Nome da vaga</label>
                                <input type="text" name="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="state">Estado</label>
                                <select name="state">
                                    <option selected value="">Selecione</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="salary">Salário à partir de</label>
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
                        <p class="total-vagas">{{$opportunities->count()}} vaga(s) de emprego</p>
                    </div>
                </div>

                @foreach($opportunities as $opportunity)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <span>{{$opportunity->name}}</span>
                            <span style="float: right;">
                                <a href="{{route('opportunity.show', ['id'=> $opportunity->id])}}" data-plan="{{$status}}" class="act-plan"><button type="button" class="btn btn-info">    
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button></a>
                            </span>
                            <p id="salario">
                                @if($opportunity->salary == 0)
                                A combinar
                            @else
                                {{number_format($opportunity->salary, '2', ',', '.')}}
                            @endif
                                </p>
                            <p><b>{{$opportunity->num}} vaga(s)</b></p>
                            <p><b>Tipo de Contrato: </b> {{$opportunity->contract->name}}</p>
                            <p>{{$opportunity->activity}}</p>
                            <a href="{{route('opportunity.edit', ['id' => $opportunity->id])}}" data-plan="{{$status}}" class="act-plan">
                                <button class="btn-result">
                                    <div class="border">
                                        <img src="{{asset('images/icon-plus.png')}}">
                                    </div>
                                    <p>Editar Vaga</p>
                                </button>
                            </a>
                            @if($opportunity->publish == 1)
                            <a href="{{route('opportunity.publish', ['id' => $opportunity->id])}}" data-plan="{{$status}}" class="act-plan">
                                <button class="btn-result">
                                    <div class="border">
                                        <img src="{{asset('images/icon-plus.png')}}">
                                    </div>
                                    <p>Publicar Vaga</p>
                                </button>
                            </a>
                            @else
                            <a href="{{route('opportunity.destroy', ['id' => $opportunity->id])}}">
                                <button class="btn-result">
                                    <div class="border">
                                        <img src="{{asset('images/icon-plus.png')}}">
                                    </div>
                                    <p>Remover Vaga</p>
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