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
                            <input class="n-icon" type="text" name="name" placeholder="Cargo ou Área Profissional">
                            <p>Exemplos: Vendedor, motorista, estágios etc.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
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
        </div>
    </div>    
</section>
@stop