@extends('candidate.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Editando seu currículo</h1>
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                        {{ csrf_field() }}
                        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Dados </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 for="name">Nome</h4>
                                <h5>{{$candidate->name}}</h5>
                            </div>
                            <div class="col-sm-6">
                                <h4 for="email">E-mail</h4>
                                <h5>{{$candidate->email}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 for="cep">CEP</h4>
                                <h5>{{$candidate->cep}}</h5>
                            </div>
                            <div class="col-sm-6">
                                <h4 for="street">Logradouro</h4>
                                <h5>Rua Sestilio Melani</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 for="nehighbor">Bairro</h4>
                                <h5>A E Carvalho</h5>
                            </div>
                            <div class="col-sm-4">
                                <h4 for="city">Cidade</h4>
                                <h5>São Paulo</h5>
                            </div>
                            <div class="col-sm-2">
                                <h4 for="number">Número</h4>
                                <h5>620</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <h4 for="state_id">Estado</h4>
                                <h5> {{$candidate->state->name}}</h5>
                            </div>
                            <div class="col-sm-5">
                                <h4 for="cpf">CPF</h4>
                                <h5>{{$candidate->cpf}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <h4 for="phone">Telefone</h4>
                                <h5>{{$candidate->phone}}</h5>
                            </div>
                            <div class="col-sm-5">
                                <h4 for="birthdate">Data de nascimento</h4>
                                <h5>{{$candidate->birthdate}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <h4 for="marital_status">Estado civil</h4>
                                <h5>{{$candidate->marital_status}}</h5>
                          
                            </div>
                            <div class="col-sm-5">
                                <h4 for="sex">Sexo</h4>
                                <h5>
                                    @if($candidate->sex == "M")
                                    Masculino
                                    @else
                                    Feminino
                                    @endif
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="lbl-caracteristicas"><input type="checkbox" class="isSpecial" name="isSpecial"><span class="checkmark"></span>Pessoa com deficiência física</h4>
                            </div>
                        </div>
                        <div class="row" id="special">
                        <hr>
                            @foreach($specials as $special)
                            <div class="col-sm-2">
                                <h4 class="lbl-caracteristicas"><input type="checkbox" value="{{$special->id}}" name="specials[]"><span class="checkmark" ></span>{{$special->name}}</h4>
                            </div>
                            @endforeach
                            <div class="col-sm-12">
                                <h4 for="special_description" style="margin-top: 20px;">Condições especiais</h4>
                                <textarea name="special_description" placeholder="Descreva condições especiais de transporte, trabalho, acompanhamento etc."></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Redes sociais</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 for="linkedin">Linkedin</h4>
                                <h5>{{$candidate->linkedin}}</h5>
                            </div>
                            <div class="col-sm-6">
                                <h4 for="facebook">Facebook</h4>
                                <h5>{{$candidate->facebook}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 for="twitter">Twitter</h4>
                                <h5>{{$candidate->twitter}}</h5>
                            </div>
                            <div class="col-sm-6">
                                <h4 for="blog">Blog</h4>
                                <h5>{{$candidate->blog}}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Informações complementares</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="info-adc">Tipo de habilitação para dirigir</h4>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($drivers as $driver)
                            <div class="col-sm-1">
                                <h4 class="lbl-caracteristicas"><input type="checkbox" value="{{$driver->id}}" name="drivers[]"><span class="checkmark"></span>{{$driver->name}}</h4>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="info-adc" style="margin-top: 20px;">Possui veículo próprio? Qual?</h4>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($vehicles as $vehicle)
                            <div class="col-sm-2">
                                <h4 class="lbl-caracteristicas"><input type="checkbox" value="{{$vehicle->id}}" name="vehicles[]"><span class="checkmark"></span>{{$vehicle->name}}</h4>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="info-adc" style="margin-top: 20px;">Tem disponibilidade para viajar?</h4>
                                <h5>
                                @if($candidate->travel == 1)
                                Sim
                                @else
                                Não
                                @endif
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="info-adc" style="margin-top: 20px;">Tem disponibilidade para mudar de residência?</h4>
                                <h5>
                                @if($candidate->change == 1)
                                Sim
                                @else
                                Não
                                @endif
                                </h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Objetivos profissionais</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <h4 for="journey_id">Jornada</h4>
                                <h5>{{$candidate->journey->name}}</h5>
                            </div>
                            <div class="col-sm-5">
                                <h4 for="contract_type_id">Tipo de contrato</h4>
                                <h5>{{$candidate->contract_type->name}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <h4 for="min_hierarchy_id">Nível hierárquico mínimo</h4>
                                <h5>{{$candidate->min_hierarchy->name}}</h5>
                            </div>
                            <div class="col-sm-5">
                                <h4 for="max_hierarchy_id">Nível hierárquico máximo</h4>
                                <h5>{{$candidate->max_hierarchy->name}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <h4 for="salary">Pretenção salarial mínima</h4>
                                <h5>R$ {{number_format($candidate->salary, 2, ',', '.')}}</h5>
                            </div>
                            <div class="col-sm-5">
                                <h4 for="estadotrab">Estado onde deseja trabalhar</h4>
                                <select name="estadotrab">
                                    <option selected disabled>Selecione</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Formação acadêmica</h4>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">Instuição</th>
                                          <th scope="col">Formação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($candidate->formations as $formation)
                                        <tr>
                                          <td>{{$formation->name}}</td>
                                          <td>{{$formation->name}}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Experiência profissional</h4>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">Cargo</th>
                                          <th scope="col">Empresa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($candidate->experiences as $experience)
                                        <tr>
                                          <td>{{$experience->occupation}}</td>
                                          <td>{{$experience->name}}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Idiomas</h4>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">Idioma</th>
                                          <th scope="col">Nível</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($candidate->languages as $language)
                                        <tr>
                                          <td>{{$language->name}}</td>
                                          <td>{{$language->level}}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Conhecimentos de informática</h4>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-6">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">Idioma</th>
                                          <th scope="col">Nível</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($candidate->knowledges as $knowledge)
                                        <tr>
                                          <td>{{$knowledge->name}}</td>
                                          <td>{{$knowledge->name}}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{route('candidate.edit')}}">
                                    <button class="btn-orange">Editar meu currículo</button>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>        
    </div> 
</section>

@stop