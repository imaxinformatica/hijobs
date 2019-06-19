<header>
  <div id="barra-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <ul id="top-type">
            <li id="top-candidate" class="active"><a href="{{url('/')}}">CANDIDATOS</a></li>
            <li id="top-company" ><a href="{{route('company.index')}}">EMPRESAS</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="logo" href="{{route('candidate.index')}}"><img src="{{asset('images/logo.png')}}"></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          @auth
          <li><a href="{{route('candidate.opportunity')}}">BUSCAR VAGAS</a></li>
          <li><a href="{{route('candidate.show')}}">DADOS PESSOAIS</a></li>
          <li id="login"><a href="{{url('candidato/logout')}}">SAIR</a></li>
          @endauth
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>
</header>

@if(session()->has('success'))
  <div class="container">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('success')}}
        </div>
      </section>
    </div>
  </div>
@endisset
@if(session()->has('info'))
  <div class="container">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('info')}}
        </div>
      </section>
    </div>
  </div>
@endisset
@if(session()->has('danger'))
  <div class="container">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('danger')}}
        </div>
      </section>
    </div>
  </div>
@endisset
@if(session()->has('warning'))
  <div class="container">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('warning')}}
        </div>
      </section>
    </div>
  </div>
@endisset

@if ($errors->any())
  <div class="container">
    @foreach ($errors->all() as $error)
      <div class="row">
        <div class="col-sm-12">
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $error }}
          </div>
        </div>
      </div>
    @endforeach
  </div> 
@endif