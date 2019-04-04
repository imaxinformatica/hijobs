@extends('admin.templates.default')

@section('title', 'Adicionar lote de produtos')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar lote de produtos</h1>
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
        <section class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.batch.store')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row box-nome" >
                  <div class="col-sm-6">
                    <label for="batch_code">Código Lote</label>
                    @if(session()->has('batch_code'))
                      <input type="text" name="batch_code" class="form-control" id="batch_code" value="{{session('batch_code')}}">
                    @else
                      <input type="text" name="batch_code" class="form-control" id="batch_code">
                    @endif
                  </div>
                  <div class="col-sm-6">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <label for="height">Altura</label>
                    <input type="text" name="height" class="form-control" id="height" value="{{old('height')}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="width">Largura</label>
                    <input type="text" name="width" class="form-control" id="width" value="{{old('width')}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="length">Comprimento</label>
                    <input type="text" name="length" class="form-control" id="length" value="{{old('length')}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="weight">Peso</label>
                    <input type="text" name="weight" class="form-control" id="weight" value="{{old('weight')}}" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <label for="purchase_price">Preço de Compra</label>
                    <input type="text" name="purchase_price" class="form-control input-money" id="purchase_price" value="{{old('purchase_price')}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="sale_price">Preço de Venda</label>
                    <input type="text" name="sale_price" class="form-control input-money" id="sale_price" value="{{old('sale_price')}}" required>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
              </div>
            </form>
          </div>
        </section>
      </div>
    </section>
    <!-- /.content -->
  </div>

@stop