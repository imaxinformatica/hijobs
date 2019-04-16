@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <img class="icon-vagas" src="{{asset('images/icon-result.png')}}">
                        <p class="total-vagas">{{$opportunity->candidate->count()}} Candidato(s)</p>
                    </div>
                </div>
                @foreach($opportunity->candidate as $candidate)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <span><b>Nome: </b>{{$candidate->name}}</span>
                            <p><b>Pretensão Salarial: </b>A partir de R$ {{number_format($candidate->salary, 2, ',', '.')}}</p>
                            <p><b>Estado: </b>{{$candidate->state->name}}</p>
                            <a href="{{route('company.cv', ['id'=> $candidate->id])}}">
                                <button class="btn-result" type="button">
                                    <div class="border">
                                        <img src="{{asset('images/icon-plus.png')}}">
                                    </div>
                                    <p>Mais detalhes do candidato</p>
                                </button>
                            </a>
                        </div>   
                    </div>
                </div>
                @endforeach
            </div>
        </div>        
    </div> 
</section>
@stop