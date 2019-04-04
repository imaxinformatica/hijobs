@extends('admin.templates.default')

@section('title', 'Editar lote de produtos')

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
            <form method="POST" action="{{route('admin.batch.update')}}">
              {{csrf_field()}}
              <input type="hidden" name="id_batch" value="{{$batch->id}}">
              <div class="box-body">
                <div class="form-group row box-nome" >
                  <div class="col-sm-6">
                    <label for="batch_code">Código Lote</label>
                    <input type="text" name="batch_code" class="form-control" id="batch_code" value="{{$batch->batch_code}}">
                  </div>
                  <div class="col-sm-6">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$batch->name}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <label for="height">Altura</label>
                    <input type="text" name="height" class="form-control" id="height" value="{{$batch->height}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="width">Largura</label>
                    <input type="text" name="width" class="form-control" id="width" value="{{$batch->width}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="length">Comprimento</label>
                    <input type="text" name="length" class="form-control" id="length" value="{{$batch->length}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="weight">Peso</label>
                    <input type="text" name="weight" class="form-control" id="weight" value="{{$batch->weight}}" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <label for="purchase_price">Preço de Compra</label>
                    <input type="text" name="purchase_price" class="form-control input-money" id="purchase_price" value="{{number_format($batch->purchase_price, 2, ',', '.')}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="sale_price">Preço de Venda</label>
                    <input type="text" name="sale_price" class="form-control"  id="sale_price" value="{{number_format($batch->sale_price, 2, ',', '.')}}" required>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </div>
            </form>
          </div>
        </section>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button class="btn bg-olive act-batch" data-id="{{$batch->id}}">ADICIONAR PRODUTO</button>
          <br><br>
        </div>
      </div>
      <!-- </div> -->
      <div class="row">
        <section class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Relação de produtos do lote</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Código de barras</th>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>NCM</th>
                    <th>Vencimento</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($batch->product as $product)
                  <tr>
                    <td>{{$product->bar_code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->brand}}</td>
                    <td>{{$product->ncm}}</td>
                    <td>{{$product->due_date}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                      <a href="{{route('admin.batch.product', ['id_product' => $product->id, 'id_batch' =>$batch->id])}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7">Nenhum produto adicionado ao lote</td>
                  </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@stop