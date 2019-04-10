@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="box-result-search">
                    <form method="POST" action="#">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{route('company.opportunity.create')}}">
                                    <button class="btn-result">
                                        <div class="border">
                                            <img src="{{asset('images/icon-plus.png')}}">
                                        </div>
                                        <p>Criar vaga</p>
                                    </button>
                                </a>
                                <label for="cargo">Cargo ou área profissional</label>
                                <select name="cargo">
                                    <option selected disabled>Selecione</option>
                                    <option>Analista de Sistemas</option>
                                    <option>Analista de Sistemas</option>
                                    <option>Analista de Sistemas</option>
                                    <option>Analista de Sistemas</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="cidade">Cidade, estado ou região</label>
                                <select name="cidade">
                                    <option selected disabled>Selecione</option>
                                    <option>São Paulo</option>
                                    <option>São Paulo</option>
                                    <option>São Paulo</option>
                                    <option>São Paulo</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="salario">Salário desejado</label>
                                <select name="salario">
                                    <option selected disabled>Selecione</option>
                                    <option>R$1.000,00 a 2.500,00</option>
                                    <option>R$1.000,00 a 2.500,00</option>
                                    <option>R$1.000,00 a 2.500,00</option>
                                    <option>R$1.000,00 a 2.500,00</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="contrato">Tipo de contrato</label>
                                <select name="contrato">
                                    <option selected disabled>Selecione</option>
                                    <option>Estágio</option>
                                    <option>Estágio</option>
                                    <option>Estágio</option>
                                    <option>Estágio</option>
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
                        <p class="total-vagas">{{$company->opportunities()->count()}} vaga(s) de emprego</p>
                    </div>
                </div>
                @foreach($company->opportunities as $opportunity)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <span>{{$opportunity->name}}</span>
                            <p id="salario">{{number_format($opportunity->salary, '2', ',', '.')}}<p>
                            <p><b>{{$opportunity->num}} vaga(s)</b></p>
                            <p>{{$opportunity->activity}}</p>
                            <a href="{{route('company.opportunity.edit', ['id' => $opportunity->id])}}">
                                <button class="btn-result">
                                    <div class="border">
                                        <img src="{{asset('images/icon-plus.png')}}">
                                    </div>
                                    <p>Editar Vaga</p>
                                </button>
                            </a>
                            @if($opportunity->publish == 1)
                            <a href="{{route('company.opportunity.edit', ['id' => $opportunity->id])}}">
                                <button class="btn-result">
                                    <div class="border">
                                        <img src="{{asset('images/icon-plus.png')}}">
                                    </div>
                                    <p>Publicar Vaga</p>
                                </button>
                            </a>
                            @else
                            <a href="{{route('company.opportunity.edit', ['id' => $opportunity->id])}}">
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