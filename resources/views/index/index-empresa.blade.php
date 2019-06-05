@extends('index.templates.default-empresa')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<?php
 $states = DB::table('states')->get();
?>
<section class="search search-company">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 search-job search-company">
                <h1>Buscar candidatos</h1>
                <form method="GET" action="{{route('company.candidate')}}">
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="occupation" class="n-icon" type="text" name="occupation" placeholder="Cargo ou Área Profissional">
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
          
            <video controlsList="nodownload" oncontextmenu="return false;" class="afterglow" id="{{$row->id}}" style="width:100%; height: 350px; object-fit: cover;">
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
        
</div>
@stop