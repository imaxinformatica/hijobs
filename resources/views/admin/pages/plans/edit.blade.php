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
    @if(session()->has('warning'))
      <section class="content-header">
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
      </section>
    @endisset
    @if(session()->has('info'))
      <section class="content-header">
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
      </section>
    @endisset
    @if(session()->has('danger'))
      <section class="content-header">
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
            <form method="POST" action="{{route('admin.plan.update')}}">
              {{csrf_field()}}
              <input type="hidden" name="code" value="{{$plan->code}}">
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="type">Tipo de Plano</label>
                    <select name="type" class="form-control">
                      <option value="empresa" <?php echo $plan->type == 'empresa' ? 'selected' : "" ?>>Empresa</option>
                      <option value="candidato" <?php echo $plan->type == 'candidato' ? 'selected' : "" ?>>Candidato</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="preApprovalName" >Nome do Plano</label>
                    <input type="text" disabled name="preApprovalName" value="{{$plan->name}}" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="value">Valor do Plano</label>
                    <input type="text" name="value" value="{{$plan->value}}" class="form-control input-money">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
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