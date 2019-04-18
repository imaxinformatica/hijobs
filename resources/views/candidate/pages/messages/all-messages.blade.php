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
                        <p class="total-vagas">{{$candidate->messages()->count()}} Mensagem(s)</p>
                    </div>
                </div>
                @forelse($candidate->messages as $message)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <p><b>Candidato: </b>{{$candidate->name}}</p>
                            <p><b>Mensagem: </b> {{$message->text}}</p>  
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