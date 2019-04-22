@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="search search-company">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 search-job search-company">
                <h1>Buscar candidatos</h1>
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="occupation" type="text" name="occupation" placeholder="Cargo ou Área Profissional">
                            <p>Exemplos: Vendedor, motorista, estágios etc.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="state_id">Estados</label>
                            <select name="state_id" class="form-control">
                                <option selected value="">Selecione</option>
                                @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button class="btn-orange">
                                BUSCAR
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4 search-job search-company">
                <h1>Cadastrar vaga</h1>
                <form action="{{route('company.session')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="user" type="text" name="opportunity" placeholder="Cargo ou Área Profissional">
                            <p>Exemplos: Vendedor, motorista, estágios etc.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="place" type="text" name="email" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <button class="btn-orange">
                                CADASTRAR
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</section>

<section class="recrutamento">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Otimize sua forma de recrutamento</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="{{asset('images/megafone.png')}}" alt="Passo-a-passo">
                    <p class="title-box-recrutamento">Divulgue corretamente</p>
                    <p class="content-box-recrutamento">Divulgue vagas e alcance talentos</p>
                    <p class="content-box-recrutamento">Receba currículos compatíveis</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="{{asset('images/lupa-search.png')}}" alt="Passo-a-passo">
                    <p class="title-box-recrutamento">Recrute de forma eficaz</p>
                    <p class="content-box-recrutamento">Busque profissionais por região</p>
                    <p class="content-box-recrutamento">Utilize nossos filtros avançados</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="{{asset('images/settings.png')}}" alt="Passo-a-passo">
                    <p class="title-box-recrutamento">Gerencie e acompanhe</p>
                    <p class="content-box-recrutamento">Acompanhe a candidatura</p>
                    <p class="content-box-recrutamento">Gerencie e contate candidatos</p>
                </div>
            </div>
        </div>
    </div>
</section>
@stop