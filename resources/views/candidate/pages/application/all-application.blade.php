@extends('candidate.templates.default')

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
                        <p class="total-vagas">{{$candidate->opportunity()->count()}} Candidatura(s)</p>
                    </div>
                </div>
                @forelse($candidate->opportunity()->get() as $opportunity)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <p><b>Empresa: </b>{{$candidate->name}}</p>
                            <p><b>Vaga: </b> {{$opportunity->company->name}}</p>  
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>        
    </div> 
</section>
@stop