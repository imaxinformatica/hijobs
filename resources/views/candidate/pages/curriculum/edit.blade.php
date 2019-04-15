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
                    <form action="{{route('candidate.update')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Dados pessoais</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" value="{{$candidate->name}}" placeholder="Seu nome completo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="{{$candidate->email}}" placeholder="Seu e-mail">
                            </div>
                            <div class="col-sm-6">
                                <a class="act-password">
                                    <button class="btn-orange" type="button" class="act-password">Alterar a Senha</button>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="cep">CEP</label>
                                <input type="text" class="input-cep" value="{{$candidate->cep}}" name="cep" placeholder="Seu CEP">
                            </div>
                            <div class="col-sm-6">
                                <label for="street">Logradouro</label>
                                <input type="text" name="street" placeholder="Logradouro">
                            </div>
                            <div class="col-sm-2">
                                <label for="number">Número</label>
                                <input type="text" name="number"  placeholder="Número e Complemento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nehighbor">Bairro</label>
                                <input type="text" name="nehighbor" placeholder="Bairro">
                            </div>
                            <div class="col-sm-4">
                                <label for="city">Cidade</label>
                                <input type="text"  name="city" placeholder="Cidade">
                            </div>
                            <div class="col-sm-4">
                                <label for="state_id">Estado</label>
                                <select name="state_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}" <?php if ($state->id == $candidate->state_id): echo "selected"; endif; ?>>{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cpf">CPF</label>
                                <input type="text" class="input-cpf" value="{{$candidate->cpf}}" name="cpf" placeholder="Digite seu CPF">
                            </div>
                            <div class="col-sm-6">
                                <label for="phone">Telefone</label>
                                <input type="text" class="input-phone" value="{{$candidate->phone}}" name="phone" placeholder="Seu telefone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="birthdate">Data de nascimento</label>
                                <input type="text" class="input-date" value="{{$candidate->birthdate}}" name="birthdate" placeholder="Sua data de nascimento">
                            </div>
                            <div class="col-sm-4">
                                <label for="marital_status">Estado civil</label>
                                <select name="marital_status">
                                    <option selected disabled>Selecione</option>
                                    <option value="Solteiro" <?php if ($candidate->marital_status == "Solteiro"): echo "selected"; endif; ?>>Solteiro</option>
                                    <option value="Casado" <?php if ($candidate->marital_status == "Casado"): echo "selected"; endif; ?>>Casado</option>
                                    <option value="Divorciado" <?php if ($candidate->marital_status == "Divorciado"): echo "selected"; endif; ?>>Divorciado</option>
                                    <option value="Viúvo" <?php if ($candidate->marital_status == "Viúvo"): echo "selected"; endif; ?>>Viúvo</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="sex">Sexo</label>
                                <select name="sex">
                                    <option selected disabled>Selecione</option>
                                    <option value="M" <?php if ($candidate->sex == "M"): echo "selected"; endif; ?>>Masculino</option>
                                    <option value="F" <?php if ($candidate->sex == "F"): echo "selected"; endif; ?>>Feminino</option>
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
                                <input type="text" name="linkedin" value="{{$candidate->linkedin}}" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" value="{{$candidate->facebook}}" placeholder="Informe a url do seu perfil">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" value="{{$candidate->twitter}}" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="blog">Blog</label>
                                <input type="text" name="blog" value="{{$candidate->blog}}" placeholder="Informe a url do seu perfil">
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
                                <label class="lbl-caracteristicas">
                                    <input type="checkbox" value="{{$driver->id}}" name="drivers[]"><span class="checkmark"></span>{{$driver->name}}
                                </label>
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
                                <label class="lbl-caracteristicas"><input type="radio" value="1" <?php if ($candidate->travel == "1"): echo "checked"; endif; ?> name="travel"><span class="checkmark check-radio"></span>Sim</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" value="0" <?php if ($candidate->travel == "0"): echo "checked"; endif; ?> name="travel"><span class="checkmark check-radio"></span>Não</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="info-adc" style="margin-top: 20px;">Tem disponibilidade para mudar de residência?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" <?php if ($candidate->change == "1"): echo "checked"; endif; ?> value="1" name="change"><span class="checkmark check-radio"></span>Sim</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" <?php if ($candidate->change == "0"): echo "checked"; endif; ?> value="0" name="change"><span class="checkmark check-radio"></span>Não</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Objetivos profissionais</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="journey_id">Jornada</label>
                                <select name="journey_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($journeys as $journey)
                                    <option value="{{$journey->id}}" <?php if ($candidate->contract_type_id == $journey->id): echo "selected"; endif; ?>>{{$journey->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="contract_type_id">Tipo de contrato</label>
                                <select name="contract_type_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($contract_types as $contract)
                                    <option value="{{$contract->id}}" <?php if ($candidate->contract_type_id == $contract->id): echo "selected"; endif; ?>>{{$contract->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="min_hierarchy_id">Nível hierárquico mínimo</label>
                                <select name="min_hierarchy_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($hierarchies as $hierarchy)
                                    <option value="{{$hierarchy->id}}" <?php if ($candidate->min_hierarchy_id == $hierarchy->id): echo "selected"; endif; ?>>{{$hierarchy->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="max_hierarchy_id">Nível hierárquico máximo</label>
                                <select name="max_hierarchy_id">
                                    <option selected disabled>Selecione</option>
                                    @foreach($hierarchies as $hierarchy)
                                    <option value="{{$hierarchy->id}}" <?php if ($candidate->max_hierarchy_id == $hierarchy->id): echo "selected"; endif; ?>>{{$hierarchy->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="salary">Pretenção salarial mínima</label>
                                <input type="text" value="{{number_format($candidate->salary, 2, ',', '.')}}" class="input-money" name="salary" placeholder="Ex:. 2500">
                            </div>
                            <div class="col-sm-5">
                                <label for="state_work">Estado onde deseja trabalhar</label>
                                <select name="state_work[]" class="state-work" multiple="multiple">
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                       <div class="row">
                <div class="col-sm-12">
                    <h4>Formação acadêmica</h4>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Instuição</th>
                                <th scope="col">Formação</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Situação</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidate->formations as $formation)
                            <tr>
                                <td>{{$formation->name}}</td>
                                <td>{{$formation->level->name}}</td>
                                 <td>{{$formation->course->name}}</td>
                                <td>{{ucfirst($formation->situation)}}</td>
                                <td>
                                    <a href="{{route('candidate.formation.destroy', ['id' => $formation->id])}}">
                                        <button class="btn btn-danger" type="button">
                                        <i class="fa fa-times" aria-hidden="true"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn-result act-formation">
                        <div class="border">
                            <img src="{{asset('images/icon-plus.png')}}">
                        </div>
                        <p>Incluir nova</p>
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <h4>Experiência profissional</h4>
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Empresa</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Hierarquia</th>
                                <th scope="col">Atividades Exercidas</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidate->experiences as $experience)
                            <tr>
                                <td>{{$experience->name}}</td>
                                <td>{{$experience->occupation}}</td>
                                <td>{{$experience->hierarchy->name}}</td>
                                <td>{{$experience->description}}</td>
                                <td>
                                    <a href="{{route('candidate.experience.destroy', ['id' => $experience->id])}}">
                                        <button class="btn btn-danger" type="button">
                                        <i class="fa fa-times" aria-hidden="true"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn-result act-experience">
                        <div class="border">
                            <img src="{{asset('images/icon-plus.png')}}">
                        </div>
                        <p>Incluir nova</p>
                    </button>
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
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidate->languages as $language)
                            <tr>
                                <td>{{$language->name}}</td>
                                <td>{{$language->pivot->level}}</td>
                                <td>
                                    <a href="{{route('candidate.language.destroy', ['id' => $language->id])}}">
                                        <button class="btn btn-danger" type="button">
                                        <i class="fa fa-times" aria-hidden="true"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn-result act-language">
                        <div class="border">
                            <img src="{{asset('images/icon-plus.png')}}">
                        </div>
                        <p>Incluir novo</p>
                    </button>
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
                              <th scope="col">Categoria</th>
                              <th scope="col">Conhecimento</th>
                              <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidate->knowledges as $know)
                            <tr>
                                <td>{{$know->name}}</td>
                                <td>{{$know->subknowledges->where('id', $know->pivot->subknowledge_id)->first()->name}}</td>
                                <td>
                                    <a href="{{route('candidate.knowledge.destroy', ['id' => $language->id])}}">
                                        <button class="btn btn-danger" type="button">
                                        <i class="fa fa-times" aria-hidden="true"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn-result act-knowledge">
                        <div class="border">
                            <img src="{{asset('images/icon-plus.png')}}">
                        </div>
                        <p>Incluir novo</p>
                    </button>
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