@extends('admin.templates.default')

@section('title', 'Planos')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Planos</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </section>

    @if(session()->has('success'))
      <section class="content-header">
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
      </section>
    @endisset

    @if ($errors->any())
      <div class="content-header">
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

    <!-- Main content -->
    <section class="content">


      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Páginas</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Plano</th>
                    <th>Valor</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($plans as $plan)
                    <tr>
                      <td>{{$plan->name}}</td>
                      <td>R$ {{number_format($plan->value,2, ',','.')}}</td>
                      <td>
                        <a href="{{route('admin.plan.edit', ['id' => $plan->id])}}" title="Editar" class="act-list">
                          <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <a href="{{route('admin.plan.all-users', ['id' => $plan->id])}}" title="Usuários com plano ativo" class="act-list">
                          <i class="fa fa-users" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  @empty
                  <tr><td>Não possuem planos Criados</td></tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Plano</th>
                    <th>Valor</th>
                    <th>Ações</th>
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