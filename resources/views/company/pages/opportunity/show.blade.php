@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Editar vaga</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Detalhes da Vaga</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Cargo</h4>
                            <p>{{$opportunity->name}}</p>
                        </div>
                        <div class="col-sm-6">
                            <h4>Vaga exclusiva para PcD?</h4>
                            @if($opportunity->special == 1)
                            <p>Sim</p>
                            @else
                            <p>Não</p>
                            @endif
                        </div>
                    </div>
                    @if($opportunity->special == 1)
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Comentários sobre a vaga PCD</h4>
                            <p>{{$opportunity->comments_special}}</p>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Atividades a serem desenvolvidas</h4>
                            <p>{{$opportunity->activity}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Requisitos necessários</h4>
                            <p>{{$opportunity->requiriments}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Salário</h4>
                            @if($opportunity->salary == 0)
                                <p>A combinar</p>
                            @else
                                <p>{{number_format($opportunity->salary, '2', ',', '.')}}</p>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <h4>Regime de Contratação</h4>
                            <p>{{$opportunity->contract->name}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Horário de trabalho</h4>
                            <p>{{$opportunity->time}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Informações adicionais sobre a vaga</h4>
                            <p>{{$opportunity->additionally}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <h4>Estado(s)</h4>
                            <p>{{$opportunity->state->name}}</p>
                        </div>
                        <div class="col-sm-5">
                            <h4>Cidade(s)</h4>
                            <p>{{$opportunity->state->name}}</p>
                        </div>
                        <div class="col-sm-2">
                            <h4>Vagas</h4>
                            <p>{{$opportunity->num}}</p>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{route('opportunity.candidate', ['id' =>$opportunity->id])}}">
                                <button class="btn-orange">Candidatos</button>
                            </a>
                        </div>
                        <div class="col-sm-4"> 
                            <a href="{{route('opportunity.index')}}" >
                                <button type="button" class="btn-orange">
                                Voltar
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div> 
</section>

@stop