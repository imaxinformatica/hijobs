@extends('candidate.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Passo a passo para concluir seu currículo</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="etapas box-result-search">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="number">
                                <div class="evolucao">
                                    <p>1</p>
                                </div>
                                <h3>Dados de acesso</h3>
                            </div>
                            <img src="{{asset('images/barra.png')}}">
                        </div>
                        <div class="col-sm-4">
                            <div class="number">
                                <div class="evolucao">
                                    <p>2</p>
                                </div>
                                <h3>Dados do currículo</h3>
                            </div> 
                            <img src="{{asset('images/barra.png')}}">                       
                        </div>
                        <div class="col-sm-4">
                            <div class="number">
                                <div class="evolucao">
                                    <p>3</p>
                                </div>
                                <h3>Melhorar currículo</h3>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-result-search result-vacancies dados-pessoais">
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
                              <th scope="col">Instuição</th>
                              <th scope="col">Formação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidate->formations as $formation)
                            <tr>
                              <td>{{$formation->name}}</td>
                              <td>{{$formation->name}}</td>
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
                <div class="col-sm-6">
                    <table class="table">
                        <thead>
                            <tr>
                              <th scope="col">Cargo</th>
                              <th scope="col">Empresa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidate->experiences as $experience)
                            <tr>
                              <td>{{$experience->occupation}}</td>
                              <td>{{$experience->name}}</td>
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
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidate->languages as $language)
                            <tr>
                              <td>{{$language->name}}</td>
                              <td>{{$language->level}}</td>
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
                              <th scope="col">Idioma</th>
                              <th scope="col">Nível</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($candidate->knowledges as $knowledge)
                            <tr>
                              <td>{{$knowledge->name}}</td>
                              <td>{{$knowledge->name}}</td>
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
                    <a href="{{route('candidate.search')}}">
                        <button class="btn-orange">
                        Finalizar meu Currículo
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection