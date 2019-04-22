@extends('candidate.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Visualizando currículo</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{route('candidate.edit')}}">
                                    <button class="btn-blue">Editar meu currículo</button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="{{route('candidate.app')}}">
                                    <button class="btn-blue">Candidaturas</button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="{{route('candidate.index.message')}}">
                                    <button class="btn-blue">Mensagens</button>
                                </a>
                            </div>
                        </div>
                        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Dados Pessoais </h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p for="name"><b>Nome: </b>{{$candidate->name}}</p>
                                <p for="name"><b>E-mail: </b>{{$candidate->email}}</p>
                                <p for="name"><b>Telefone: </b>{{$candidate->phone}}</p>
                                <p for="name"><b>Estado Civil: </b>{{$candidate->marital_status}}</p>
                                <p for="name"><b>Data de Nascimento: </b>{{$candidate->birthdate}}</p>
                                <p for="name"><b>Endereço: </b>Rua Sestilio Melani, 620, A E Carvalho, São Paulo</p>
                            </div>
                            
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <p><b>Pessoa com deficiência física?</b> @if($candidate->special == 1) Sim
                                    @foreach($candidate->special()->get() as $special)
                                    <p>
                                    {{$special->name}}
                                    </p>
                                    @endforeach
                                    {{$candidate->special_description}}
                                    @else Não @endif
                                </p>
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
                                          <th scope="col">Instituição</th>
                                          <th scope="col">Formação</th>
                                          <th scope="col">Curso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($candidate->formations as $formation)
                                        <tr>
                                            <td>{{$formation->name}}</td>
                                            <td>{{$formation->level->name}}</td>
                                            <td>{{$formation->course->name}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>Nenhuma Cadastrada</td>
                                        </tr>
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
                                          <th scope="col">Hierarquia</th>
                                          <th scope="col">Atividades</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($candidate->experiences as $experience)
                                        <tr>
                                          <td>{{$experience->occupation}}</td>
                                          <td>{{$experience->name}}</td>
                                          <td>{{$experience->hierarchy->name}}</td>
                                          <td>{{$experience->description}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>Nenhuma Cadastrada</td>
                                        </tr>
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
                                            <td>{{$language->pivot->level}}</td>
                                            
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>Nenhuma Cadastrada</td>
                                        </tr>
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
                                            <th scope="col">Categoria</th>
                                            <th scope="col">Conhecimento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($candidate->knowledges as $know)
                                        <tr>
                                            <td>{{$know->name}}</td>
                                            <td>{{$know->subknowledges->where('id', $know->pivot->subknowledge_id)->first()->name}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>Nenhuma Cadastrada</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Objetivos profissionais</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @isset($candidate->journey)
                                    <p for="name"><b>Jornada: </b>{{$candidate->journey->name}}</p>
                                @endisset
                                @isset($candidate->contract_type)
                                    <p for="name"><b>Tipo de contrato: </b>{{$candidate->contract_type->name}}</p>
                                @endisset
                                @isset($candidate->min_hierarchy)
                                    <p for="name"><b>Nível hierárquico mínimo: </b>{{$candidate->min_hierarchy->name}}</p>
                                @endisset
                                @isset($candidate->max_hierarchy)
                                    <p for="name"><b>Nível hierárquico máximo: </b>{{$candidate->max_hierarchy->name}}</p>
                                @endisset
                                    <p for="name"><b>Pretenção salarial mínima: </b>R$ {{number_format($candidate->salary, 2, ',', '.')}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Redes sociais</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @if($candidate->linkedin != '')
                                <p for="name"><b>Linkedin: </b>{{$candidate->linkedin}}</p>
                                @endif
                                @if($candidate->facebook != '')
                                <p for="name"><b>Facebook: </b>{{$candidate->facebook}}</p>
                                @endif
                                @if($candidate->twitter != '')
                                <p for="name"><b>Twitter: </b>{{$candidate->twitter}}</p>
                                @endif
                                @if($candidate->blog != '')
                                <p for="name"><b>Blog: </b>{{$candidate->blog}}</p>
                                @endif                      
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>Informações complementares</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><b>Tipo de habilitação para dirigir: </b>@if($candidate->driver()->count()!= 0)
                                    @foreach($candidate->driver as $driver)
                                    {{$driver->name}}
                                    @endforeach
                                    @else Não Possui Habilitação @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><b>Possui veículo próprio?</b>@if($candidate->vehicle()->count()!= 0)
                                    Sim
                                    <p><b>Qual? </b></p>
                                    @foreach($candidate->vehicle as $vehicle)
                                    <p>
                                    {{$vehicle->name}}
                                    </p>
                                    @endforeach
                                    @else Não Possui Veículo @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><b>Tem disponibilidade para viajar? </b> @if($candidate->travel ==1)
                                    Sim
                                    @else
                                    Não
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><b>Tem disponibilidade para mudar de residência? </b> @if($candidate->change ==1)
                                    Sim
                                    @else
                                    Não
                                    @endif
                                </p>
                            </div>
                            
                        </div>
                        
                </div>
            </div>
        </div>        
    </div> 
</section>

@stop