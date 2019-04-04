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
            <form method="POST" action="{{route('admin.product.store')}}" autocomplete="off">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row box-nome" >
                  <div class="col-xs-12">
                    <label for="bar_code">Código de Barras</label>
                    @if(session()->has('bar_code'))
                      <input type="text" name="bar_code" class="form-control" id="bar_code" value="{{session('bar_code')}}">
                    @else
                      <input type="text" name="bar_code" class="form-control" id="bar_code" value="{{old('bar_code')}}">
                    @endif
                  </div>
                </div>
                <div class="form-group row box-razao-social">
                  <div class="col-xs-12">
                    <label for="name">Nome Produto</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 box-cnpj">
                    <label for="brand">Marca</label>
                    <input type="text" name="brand" class="form-control" id="brand" value="{{old('brand')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="ncm">NCM</label>
                    <input type="ncm" name="ncm" class="form-control" id="ncm" value="{{old('ncm')}}" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="feature">Características</label>
                    <input type="feature" name="feature" class="form-control" id="feature" value="{{old('feature')}}" required>
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
                  <div class="col-sm-4">
                    <label for="purchase_price">Preço Compra</label>
                    <input type="text" name="purchase_price" class="form-control input-money" id="purchase_price" value="{{old('purchase_price')}}" required>
                  </div>
                  <div class="col-sm-4">
                    <label for="sale_price">Preço Venda</label>
                    <input type="text" name="sale_price" class="form-control input-money" id="sale_price" value="{{old('sale_price')}}" required>
                  </div>
                  <div class="col-sm-4">
                    <label for="um">U.M.</label>
                    <select id="um" name="um" class="form-control" required>
                      <option selected disabled>Selecione....</option>
                      <option value="caixa">Caixa</option>
                      <option value="fardo">Fardo</option>
                      <option value="unidade">Unidade</option>
                      <option value="pacote">Pacote</option>
                    </select>
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
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@stop