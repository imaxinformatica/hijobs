@extends('admin.templates.default')

@section('title', 'Criar Plano')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Criar Plano</h1>
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
        <section class="col-lg-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.plan.store')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="type">Tipo de Plano</label>
                    <select name="type" class="form-control">
                      <option value="empresa">Empresa</option>
                      <option value="candidato">Candidato</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="preApprovalName">Nome do Plano</label>
                    <input type="text" name="preApprovalName" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="value">Valor do Plano</label>
                    <input type="text" name="value" class="form-control input-money">
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="trialPeriodDuration">Período Trial</label>
                        <input type="number" name="trialPeriodDuration"
                            class="form-control" required>
                    </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Criar</button>
                <a href="{{route('admin.plan')}}">
                  <button type="button" class="btn btn-primary">Voltar</button>
                </a>
              </div>
            </form>
          </div>
        </section>
      </div>
    </section>
  </div>

  </section>
  <!-- /.content -->
  </div>
  <!-- /.row (main row) -->

  </div>

@stop