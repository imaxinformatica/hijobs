@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Cadastrar vaga</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                    <form action="{{route('opportunity.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Detalhes da Vaga</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name">Cargo</label>
                                <input type="text" name="name"  placeholder="Ex.: Auxiliar Administrativo, Vendedor, Mecânico...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="lbl-caracteristicas"><input type="checkbox" class="isSpecial" name="isSpecial"><span class="checkmark"></span>Vaga exclusiva para PcD</label>
                            </div>
                        </div>
                        <div class="row" id="special">
                        <hr>
                            @foreach($specials as $special)
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" value="{{$special->id}}" name="specials[]"><span class="checkmark"></span>{{$special->name}}</label>
                            </div>
                            @endforeach
                            <div class="col-sm-12">
                                <label for="comments_special" style="margin-top: 20px;">Observações - PcD</label>
                                <textarea name="comments_special" placeholder="Ex: É importante o candidato portador de deficiência auditiva conheça LIBRAS"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="activity" style="margin-top: 20px;">Atividades a serem desenvolvidas</label>
                                <textarea name="activity" placeholder="Descreva as atribuições e responsabilidades do cargo."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="requiriments" style="margin-top: 20px;">Requisitos necessários</label>
                                <textarea name="requiriments" class="requiriments" placeholder="Requisitos necessários"></textarea>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="salary">Salário</label>
                                <input type="text" name="salary" class="input-money salary" placeholder="Salário">
                                <label class="lbl-caracteristicas"><input class="isCombining" type="checkbox" name="isCombining"><span class="checkmark"></span>A combinar</label>
                            </div>
                            <div class="col-sm-6">
                                <label for="contract_type_id">Regime de Contratação</label>
                                <select name="contract_type_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($contract_types as $contract)
                                    <option value="{{$contract->id}}" >{{$contract->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="time" style="margin-top: 20px;">Horário de trabalho</label>
                                <input type="text" name="time"  placeholder="Ex.: De segunda a sexta, das 9h às 18h.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="additionally" style="margin-top: 20px;">Informações adicionais sobre a vaga</label>
                                <textarea name="additionally"  placeholder="Ex.: Disponibilidade para viagens, possuir veículo próprio, carteira própria de clientes..."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="state_id">Estado</label>
                                <select name="state_id[]" class="state" multiple="multiple">
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}" >{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="city_id">Cidade</label>
                                <select name="city_id[]" class="city" multiple="multiple">
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}" >{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="city">Vagas</label>
                                <input type="text" placeholder="Ex: 5" name="num">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="btn-orange">Salvar meus dados</button>
                            </div>
                            <div class="col-sm-4"> 
                                <a href="{{route('opportunity.index')}}" >
                                    <!-- <button class="btn-orange"> -->
                                    Voltar
                                    <!-- </button> -->
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </div> 
</section>

@stop