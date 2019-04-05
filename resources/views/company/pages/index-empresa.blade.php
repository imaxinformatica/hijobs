@extends('candidate.templates.default')

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
                            <input id="office" type="text" name="office" placeholder="Cargo ou Área Profissional">
                            <p>Exemplos: Vendedor, motorista, estágios etc.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="place" type="text" name="place" placeholder="Cidade, estado ou região">
                            <p>Exemplos: São Paulo, Rio de Janeiro etc.</p>
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
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="user" type="text" name="user" placeholder="Cargo ou Área Profissional">
                            <p>Exemplos: Vendedor, motorista, estágios etc.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="place" type="text" name="place" placeholder="Cidade da empresa">
                            <p>Exemplos: São Paulo, Rio de Janeiro etc.</p>
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
                    <img src="images/megafone.png" alt="Passo-a-passo">
                    <p class="title-box-recrutamento">Divulgue corretamente</p>
                    <p class="content-box-recrutamento">Divulgue vagas e alcance talentos</p>
                    <p class="content-box-recrutamento">Receba currículos compatíveis</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="images/lupa-search.png" alt="Passo-a-passo">
                    <p class="title-box-recrutamento">Recrute de forma eficaz</p>
                    <p class="content-box-recrutamento">Busque profissionais por região</p>
                    <p class="content-box-recrutamento">Utilize nossos filtros avançados</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="images/settings.png" alt="Passo-a-passo">
                    <p class="title-box-recrutamento">Gerencie e acompanhe</p>
                    <p class="content-box-recrutamento">Acompanhe a candidatura</p>
                    <p class="content-box-recrutamento">Gerencie e contate candidatos</p>
                </div>
            </div>
        </div>
    </div>
</section>
@stop