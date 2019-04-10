@extends('candidate.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Passo a passo para concluir seu currículo</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="etapas box-result-search">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="number">
                                <div class="evolucao">
                                    <p>1</p>
                                </div>
                                <h3>Dados de acesso</h3>
                            </div>
                            <img src="{{asset('images/barra.png')}}">
                        </div>
                        <div class="col-sm-4">
                            <div class="number">
                                <div class="evolucao">
                                    <p>2</p>
                                </div>
                                <h3>Dados do currículo</h3>
                            </div> 
                            <img src="{{asset('images/barra.png')}}">                       
                        </div>
                        <div class="col-sm-4">
                            <div class="number">
                                <div class="evolucao">
                                    <p>3</p>
                                </div>
                                <h3>Melhorar currículo</h3>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                    <form action="{{route('company.opportunity.store')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Dados pessoais</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="state_id">Estado</label>
                                <select name="state_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="cpf">CPF</label>
                                <input type="text" class="input-cpf" name="cpf" placeholder="Digite seu CPF">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="phone">Telefone</label>
                                <input type="text" class="input-phone" name="phone" placeholder="Seu telefone">
                            </div>
                            <div class="col-sm-5">
                                <label for="birthdate">Data de nascimento</label>
                                <input type="text" class="input-date" name="birthdate" placeholder="Sua data de nascimento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="marital_status">Estado civil</label>
                                <select name="marital_status">
                                    <option selected disabled>Selecione</option>
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Viúvo">Viúvo</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="sex">Sexo</label>
                                <select name="sex">
                                    <option selected disabled>Selecione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="lbl-caracteristicas"><input type="checkbox" class="isSpecial" name="isSpecial"><span class="checkmark"></span>Pessoa com deficiência física</label>
                            </div>
                        </div>
                        <div class="row" id="special">
                        <hr>
                            @foreach($specials as $special)
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" value="{{$special->id}}" name="specials[]"><span class="checkmark" ></span>{{$special->name}}</label>
                            </div>
                            @endforeach
                            <div class="col-sm-12">
                                <label for="special_description" style="margin-top: 20px;">Condições especiais</label>
                                <textarea name="special_description" placeholder="Descreva condições especiais de transporte, trabalho, acompanhamento etc."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Redes sociais</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" name="linkedin" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" placeholder="Informe a url do seu perfil">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="blog">Blog</label>
                                <input type="text" name="blog" placeholder="Informe a url do seu perfil">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Informações complementares</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="info-adc">Tipo de habilitação para dirigir</label>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($drivers as $driver)
                            <div class="col-sm-1">
                                <label class="lbl-caracteristicas"><input type="checkbox" value="{{$driver->id}}" name="drivers[]"><span class="checkmark"></span>{{$driver->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="info-adc" style="margin-top: 20px;">Possui veículo próprio? Qual?</label>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($vehicles as $vehicle)
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" value="{{$vehicle->id}}" name="vehicles[]"><span class="checkmark"></span>{{$vehicle->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="info-adc" style="margin-top: 20px;">Tem disponibilidade para viajar?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" value="1" name="travel"><span class="checkmark check-radio"></span>Sim</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" value="0" name="travel"><span class="checkmark check-radio"></span>Não</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="info-adc" style="margin-top: 20px;">Tem disponibilidade para mudar de residência?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" value="1" name="change"><span class="checkmark check-radio"></span>Sim</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" value="0" name="change"><span class="checkmark check-radio"></span>Não</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Objetivos profissionais</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="journey_id">Jornada</label>
                                <select name="journey_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($journeys as $journey)
                                    <option value="{{$journey->id}}">{{$journey->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="contract_type_id">Tipo de contrato</label>
                                <select name="contract_type_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($contract_types as $contract)
                                    <option value="{{$contract->id}}">{{$contract->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="min_hierarchy_id">Nível hierárquico mínimo</label>
                                <select name="min_hierarchy_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($hierarchies as $hierarchy)
                                    <option value="{{$hierarchy->id}}">{{$hierarchy->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="max_hierarchy_id">Nível hierárquico máximo</label>
                                <select name="max_hierarchy_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($hierarchies as $hierarchy)
                                    <option value="{{$hierarchy->id}}">{{$hierarchy->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="salary">Pretenção salarial mínima</label>
                                <input type="text" class="input-money" name="salary" placeholder="Ex:. 2500">
                            </div>
                            <div class="col-sm-5">
                                <label for="estadotrab">Estado onde deseja trabalhar</label>
                                <select name="estadotrab">
                                    <option selected disabled>Selecione</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="btn-orange">Salvar meu currículo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </div> 
</section>

@stop