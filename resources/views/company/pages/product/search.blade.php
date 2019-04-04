@extends('admin.templates.default')

@section('title', 'Adicionar Produto')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar Produto</h1>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6">
          <div class="box">
            <form method="POST" action="{{route('admin.product.redirect')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row box-nome">
                  <div class="col-xs-12">
                    <label for="bar_code">Código de barras</label>
                    <input type="text" name="bar_code" class="form-control" id="bar_code" autofocus>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Continuar</button>
              </div>
            </form>
          </div>
        </section>
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@stop