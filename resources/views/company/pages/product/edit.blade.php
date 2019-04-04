@extends('admin.templates.default')

@section('title', 'Atualizar Produto')

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
            <form method="POST" action="{{route('admin.product.update')}}" autocomplete="off">
              <input type="hidden" name="id" value="{{$product->id}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row box-nome" >
                  <div class="col-xs-12">
                    <label for="bar_code">Código de Barras</label>
                    <input type="text" name="bar_code" class="form-control" id="bar_code" value="{{$product->bar_code}}">
                  </div>
                </div>
                <div class="form-group row box-razao-social">
                  <div class="col-xs-12">
                    <label for="name">Nome Produto</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 box-cnpj">
                    <label for="brand">Marca</label>
                    <input type="text" name="brand" class="form-control" id="brand" value="{{$product->brand}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="ncm">NCM</label>
                    <input type="ncm" name="ncm" class="form-control" id="ncm" value="{{$product->ncm}}" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="feature">Características</label>
                    <input type="feature" name="feature" class="form-control" id="feature" value="{{$product->feature}}" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <label for="height">Altura</label>
                    <input type="text" name="height" class="form-control" id="height" value="{{$product->height}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="width">Largura</label>
                    <input type="text" name="width" class="form-control" id="width" value="{{$product->width}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="length">Comprimento</label>
                    <input type="text" name="length" class="form-control" id="length" value="{{$product->length}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="weight">Peso</label>
                    <input type="text" name="weight" class="form-control" id="weight" value="{{$product->weight}}" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label for="purchase_price">Preço de Compra</label>
                    <input type="text" name="purchase_price" class="form-control input-money" id="purchase_price" value="{{number_format($product->purchase_price, 2, ',', '.')}}" required>
                  </div>
                  <div class="col-sm-4">
                    <label for="sale_price">Preço de Venda</label>
                    <input type="text" name="sale_price" class="form-control input-money" id="sale_price" value="{{number_format($product->sale_price, 2, ',', '.')}}" required>
                  </div>
                  <div class="col-sm-4">
                    <label for="um">U.M.</label>
                    <select id="um" name="um" class="form-control" required>
                      <option selected disabled>Selecione....</option>
                      <option value="caixa" <?php if($product->um == 'caixa'){ echo 'selected'; } ?>>Caixa</option>
                      <option value="fardo" <?php if($product->um == 'fardo'){ echo 'selected'; } ?>>Fardo</option>
                      <option value="unidade" <?php if($product->um == 'unidade'){ echo 'selected'; } ?>>Unidade</option>
                      <option value="pacote" <?php if($product->um == 'pacote'){ echo 'selected'; } ?>>Pacote</option>
                    </select>
                  </div> 
                </div>              
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </div>
            </form>
          </div>
        </section>
        <section class="col-lg-6">
          <!-- small box -->
          <div class="row">
            <div class="col-sm-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <p>Quantidade em estoque</p>
                  <h3>{{$product->total()}}</h3>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <p>Itens Vencidos</p>
                  <h3>{{$product->due_date()}}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar transação</h3>
            </div>
            <form method="POST" action="{{route('admin.stock.create', ['id'=>$product->id])}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row" >
                  <div class="col-sm-6">
                    <label for="quantity">Quantidade</label>
                    <input type="text" name="quantity" class="form-control" id="quanty">
                  </div>
                  <div class="col-sm-6">
                    <label for="date_transaction">Data de Transação</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="date_transaction" class="form-control pull-right input-date">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="type">Tipo de Transação</label>                  
                    <select id="type-transaction" name="type" class="form-control">
                      <option selected disabled>Selecione....</option>
                      <option value="1">Entrada</option>
                      <option value="2">Saída Esporádica</option>
                      <option value="3">Saída por Vencimento</option>
                    </select>
                  </div>
                  <div class="col-sm-6" id="due_date">
                    <label for="due_date">Data de Vencimento</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>                     
                        <input type="text" name="due_date" class="form-control pull-right input-date">
                    </div>
                    <div class="form-group">
                      <input type="checkbox" id="no_due" name="no_due">
                      <label for="no_due">Sem Vencimento</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
              </div>
            </form>
          </div>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Relatório de estoque</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Data</th>
                    <th>Vencimento</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($stocks as $stock)
                  <tr>
                    <td>{{$stock->date_transaction}}</td>
                    <td>{{$stock->due_date}}</td>
                    <td>@if($stock->type==1)Entrada @else Saída @endif</td>
                    <td>{{$stock->quantity}}</td>
                    <td>
                      <a href="#" title="Editar" class="act-stock" data-id="{{$stock->id}}" data-type="{{$stock->type}}" data-trasaction="{{$stock->date_transaction}}" data-quantity="{{$stock->quantity}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </section>
    <!-- /.content -->
  </div>

@stop