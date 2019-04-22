@extends('candidate.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')

<section class="search search-vacancies">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 search-job col-sm-offset-4">
                <h1>Buscar vagas</h1>
                <form method="GET" action="{{route('candidate.search')}}">
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="name" type="text" name="name" placeholder="Cargo ou Área Profissional">
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
        </div>
    </div>    
</section>
@stop