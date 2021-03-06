@extends('index.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<?php
 $states = DB::table('states')->get();
?>

<section class="search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 search-job col-sm-offset-4">
                <h1>Buscar vagas</h1>
                <form method="GET" action="{{route('candidate.search')}}">
                    <div class="row">
                        <div class="col-sm-12">
                            <input class="n-icon" type="text" name="name"
                                placeholder="Cargo ou Área Profissional">
                            <p>Exemplos: Vendedor, motorista, estágios etc.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <select name="state_id" class="form-control">
                                <option selected value="" disabled hidden>Estado</option>
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

<section class="new-job">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Como conseguir seu novo emprego</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="images/job1.png" alt="Passo-a-passo">
                    <p>Cadastre seu <br>currículo</p>
                    <div class="order">
                        <p>1</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="images/job2.png" alt="Passo-a-passo">
                    <p>Candidate-se <br>a vagas</p>
                    <div class="order vacancy">
                        <p>2</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="images/job3.png" alt="Passo-a-passo">
                    <p>Acompanhe suas <br>candidaturas</p>
                    <div class="order application">
                        <p>3</p>
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::guard('candidate')->check())
        @else
        <div class="row">
            <div class="col-sm-2 col-sm-offset-5">
                <a href="{{route('candidate.create')}}">
                    <button class="btn-orange">
                        Cadastrar currículo
                    </button>
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

<section class="result-job">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p><b>AS VAGAS MAIS BUSCADAS</b></p>
            </div>
        </div>
        <div class="row">
            @forelse($opportunities as $opportunity)
            @if($opportunity->publish == 2)
            <div class="col-sm-6">
                <div class="box-result-job">
                    <span>{{$opportunity->name}}</span><br>
                    @if($opportunity->salary == 0)
                    <p>A Combinar</p>
                    @else
                    <p class="pay">R$ {{number_format($opportunity->salary, 2, ',', '.')}}</p>
                    @endif
                    <p><b>{{$opportunity->num}} vaga(s)</b> em {{$opportunity->city->name}},
                        {{$opportunity->state->sigla}}</p>

                    @if(Auth::guard('candidate')->check())
                    <?php 

                    $auth = Auth::guard('candidate')->user();
                    $status = ' SUSPENDED'; 
                    if ($auth) {
                        if ($auth->transaction) {
                            $status = $auth->transaction->status;
                        }
                    }
                    ?>
                    <a href="{{route('candidate.show.opportunity', ['id' => $opportunity->id])}}"
                        data-plan="{{$status}}" class="act-plan">Visualizar</a>
                    @endif
                </div>
            </div>
            @endif
            @empty
            <div class="col-sm-6">
                <p>Não possuem vagas cadastradas</p>
            </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p class="title-section"><b>ESCOLHA A MELHOR EMPRESA PARA TRABALHAR</b></p>
            </div>
        </div>
        <div class="row">
            @forelse($companies as $company)
            <div class="col-sm-5ths">
                <div class="box-company">
                    <img src="{{asset('images/company/')}}/{{$company->thumbnail}}" alt="Empresa">
                    <p>{{$company->opportunities->count()}} vaga(s)</p>
                </div>
            </div>
            @empty
            <div class="col-sm-6">
                <p>Não possuimos empresas para recomendar</p>
            </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p class="title-section"><b>ENCONTRE VAGAS NAS MAIORES CIDADES</b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="box-cities">
                    <ul>
                        <li><a href="{{route('candidate.search')}}?city_id=3830">São Paulo</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=3243">Rio de Janeiro</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=4006">Curitiba</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=2310">Belo Horizonte</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-cities">
                    <ul>
                        <li><a href="{{route('candidate.search')}}?city_id=4932">Porto Alegre</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=3376">Campinas</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=5418">Goiânia</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=2163">Salvador</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-cities">
                    <ul>
                        <li><a href="{{route('candidate.search')}}?city_id=950">Fortaleza</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=3849">Sorocaba</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=112">Manaus</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=1666">Campo Grande</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-cities">
                    <ul>
                        <li><a href="{{route('candidate.search')}}?city_id=3068">Uberlândia</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=4121">Maringá</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=5220">Cuiabá</a></li>
                        <li><a href="{{route('candidate.search')}}?city_id=3332">Barueri</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Video -->
        <div class="box-new-job">
            <?php
            //Columns must be a factor of 12 (1,2,3,4,6,12)
            $numOfCols = 3;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;
            ?>
            <div class="row">
                @forelse ($videos as $row)
                <div class="col-sm-<?php echo $bootstrapColWidth; ?>">

                    <video controlsList="nodownload" oncontextmenu="return false;" class="afterglow" id="{{$row->id}}"
                        style="width:100%; height: 350px; object-fit: cover;">
                        <source src="{{asset('/images/video/')}}/{{$row->video}}" type="video/mp4">
                    </video>
                </div>
                <?php
                $rowCount++;
                if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
            ?>
                @empty
                <div class="col-sm-12">
                    Não existem videos cadastrados.
                </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p class="title-section"><b>ESCOLHA A MELHOR EMPRESA PARA TRABALHAR</b></p>
                </div>
            </div>
            <div class="row">
                @forelse($partners as $partner)
                <a href="{{$partner->link}}" target="_blank">
                    <div class="col-sm-5ths">
                        <div class="box-company box-partner">
                            <img src="{{asset('images/partner/')}}/{{$partner->logo}}" alt="Parceiro">
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-sm-6">
                    <p>Não possuimos parceiros para recomendar</p>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</section>

@stop