@extends('admin.templates.default')

@section('title', 'Dashboard')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </section>

    @isset($_GET['alert'])
      <section class="content-header">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-sm-12">
            <div class="alert alert-{{$_GET['type-alert']}} alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{$_GET['alert']}}
            </div>
          </section>
        </div>
      </section>
    @endisset

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$companies->count()}}</h3>

              <p>Empresas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('admin.company')}}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$candidates->count()}}</h3>

              <p>Candidatos</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('admin.candidate')}}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$opportunities->count()}}</h3>

              <p>Vagas cadastradas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('admin.opportunities')}}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Vagas recentes</h3>
            </div>
            <div class="box-body">
              <table id="tabela-com-filtro" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nome da Vaga</th>
                    <th>Número de Vagas</th>
                    <th>Salário</th>
                    <th>Tipo de Contrato</th>
                    <th>Empresa</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($opportunities as $opportunity)
                  <tr>
                    <td>{{$opportunity->name}}</td>
                    <td>{{$opportunity->num}}</td>
                    @if($opportunity->salary == 0)
                    <td>A combinar</td>
                    @else
                    <td>{{$opportunity->salary}}</td>
                    @endif
                    <td>{{$opportunity->contract->name}}</td>
                    <td>{{$opportunity->company->name}}</td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7y">Nenhum resultado encontrado</td>
                  </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nome da Vaga</th>
                    <th>Número de Vagas</th>
                    <th>Salário</th>
                    <th>Tipo de Contrato</th>
                    <th>Empresa</th>
                  </tr>
                </tfoot>   
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@stop