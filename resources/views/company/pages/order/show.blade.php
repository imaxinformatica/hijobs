@extends('admin.templates.default')

@section('title', 'Adicionar usuário')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar Pedido</h1>
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
              <div class="box-body">
                <form id="dataOrder" method="POST" action="{{route('admin.order.store')}}" >
                  {{csrf_field()}}
                  <input type="hidden" name="order_id" value="{{$order->id}}">
                  <div class="form-group row box-razao-social">
                    <div class="col-lg-4">
                      <label for="company_name">Razão Social</label>
                      <input type="text" name="company_name" class="form-control" id="company_name" value="{{$customer->company_name}}" disabled>
                    </div>
                    <div class="col-lg-4">
                      <label for="trade">Nome Fantasia</label>
                      <input type="text" name="trade" class="form-control" id="trade" value="{{$customer->trade}}" disabled>
                    </div>
                    <div class="col-lg-4 box-cnpj">
                      <label for="cnpj">CNPJ</label>
                      <input type="text" name="cnpj" class="form-control input-cnpj" id="cnpj" value="{{$customer->cnpj}}" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label for="email">E-mail</label>
                      <input type="email" name="email" class="form-control" id="email" value="{{$customer->email}}" disabled>
                    </div>
                    <div class="col-lg-2">
                      <label for="state_registration">Inscrição Estadual</label>
                      <input type="text" name="state_registration" class="form-control input-creci" id="state_registration" value="{{$customer->state_registration}}" disabled>
                    </div>
                    <div class="col-lg-2">
                      <label for="zip_code">CEP</label>
                      <input type="text" name="zip_code" class="form-control input-cep" id="zip_code" value="{{$customer->zip_code}}" disabled>
                    </div>
                    <div class="col-lg-2">
                      <label for="state">UF</label>
                      <select class="form-control" id="state" name="state" disabled>
                        <option></option>
                        <option value="AC" <?php if($customer->state == 'AC'){ echo 'selected'; } ?> >AC</option>
                        <option value="AL" <?php if($customer->state == 'AL'){ echo 'selected'; } ?> >AL</option>
                        <option value="AM" <?php if($customer->state == 'AM'){ echo 'selected'; } ?> >AM</option>
                        <option value="AP" <?php if($customer->state == 'AP'){ echo 'selected'; } ?> >AP</option>
                        <option value="BA" <?php if($customer->state == 'BA'){ echo 'selected'; } ?> >BA</option>
                        <option value="CE" <?php if($customer->state == 'CE'){ echo 'selected'; } ?> >CE</option>
                        <option value="DF" <?php if($customer->state == 'DF'){ echo 'selected'; } ?> >DF</option>
                        <option value="ES" <?php if($customer->state == 'ES'){ echo 'selected'; } ?> >ES</option>
                        <option value="GO" <?php if($customer->state == 'GO'){ echo 'selected'; } ?> >GO</option>
                        <option value="MA" <?php if($customer->state == 'MA'){ echo 'selected'; } ?> >MA</option>
                        <option value="MG" <?php if($customer->state == 'MG'){ echo 'selected'; } ?> >MG</option>
                        <option value="MS" <?php if($customer->state == 'MS'){ echo 'selected'; } ?> >MS</option>
                        <option value="MT" <?php if($customer->state == 'MT'){ echo 'selected'; } ?> >MT</option>
                        <option value="PA" <?php if($customer->state == 'PA'){ echo 'selected'; } ?> >PA</option>
                        <option value="PB" <?php if($customer->state == 'PB'){ echo 'selected'; } ?> >PB</option>
                        <option value="PE" <?php if($customer->state == 'PE'){ echo 'selected'; } ?> >PE</option>
                        <option value="PI" <?php if($customer->state == 'PI'){ echo 'selected'; } ?> >PI</option>
                        <option value="PR" <?php if($customer->state == 'PR'){ echo 'selected'; } ?> >PR</option>
                        <option value="RJ" <?php if($customer->state == 'RJ'){ echo 'selected'; } ?> >RJ</option>
                        <option value="RN" <?php if($customer->state == 'RN'){ echo 'selected'; } ?> >RN</option>
                        <option value="RO" <?php if($customer->state == 'RO'){ echo 'selected'; } ?> >RO</option>
                        <option value="RR" <?php if($customer->state == 'RR'){ echo 'selected'; } ?> >RR</option>
                        <option value="RS" <?php if($customer->state == 'RS'){ echo 'selected'; } ?> >RS</option>
                        <option value="SC" <?php if($customer->state == 'SC'){ echo 'selected'; } ?> >SC</option>
                        <option value="SE" <?php if($customer->state == 'SE'){ echo 'selected'; } ?> >SE</option>
                        <option value="SP" <?php if($customer->state == 'SP'){ echo 'selected'; } ?> >SP</option>
                        <option value="TO" <?php if($customer->state == 'TO'){ echo 'selected'; } ?> >TO</option>
                      </select>
                    </div>
                    <div class="col-lg-2">
                      <label for="city">Cidade</label>
                      <input type="text" name="city" class="form-control" id="city" value="{{$customer->city}}" disabled>
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-lg-4">
                      <label for="address">Endereço</label>
                      <input type="text" name="address" class="form-control" id="address" value="{{$customer->address}}" disabled>
                    </div>
                    <div class="col-lg-2">
                      <label for="address_number">Número</label>
                      <input type="text" name="address_number" class="form-control" id="address_number" value="{{$customer->address_number}}" disabled>
                    </div>
                    <div class="col-lg-3">
                      <label for="district">Bairro</label>
                      <input type="text" name="district" class="form-control" id="district" value="{{$customer->district}}" disabled>
                    </div>
                    <div class="col-lg-3">
                      <label for="phone">Telefone principal</label>
                      <input type="text" name="phone" class="form-control input-telefone" id="phone" value="{{$customer->phone}}" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-lg-3">
                      <label for="freight">Frete</label>
                      <input type="text" name="freight" class="form-control input-money" id="freight" value="{{number_format($order->freight, 2, ',', '.')}}" disabled>
                    </div>
                    <div class="col-lg-3">
                      <label for="discount">Desconto</label>
                      <input type="text" name="discount" class="form-control input-money" id="discount" value="{{number_format($order->discount, 2, ',', '.')}}" disabled>
                    </div>
                    <div class="col-lg-2">
                      <label for="subtotal">Subtotal</label>
                      <input type="text" name="subtotal" class="form-control input-money" id="subtotal" value="{{$order->totalOrder}}" readonly>
                    </div>
                    <div class="col-lg-2">
                      <label for="total">Total do Pedido</label>
                      <input type="text" name="total" class="form-control input-money" id="total" value="{{$order->total}}" readonly>
                    </div>
                    <div class="col-lg-2">
                      <label for="district">Status</label>
                      <input type="text" name="district" class="form-control" id="district" value="{{$order->status}}" disabled>
                    </div>
                    <div class="col-lg-3">
                      <a href="{{route('admin.orders')}}" class="btn btn-primary">Voltar</a>
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </section>
        
      </div>
      <!-- /.row (main row) -->
      <div class="row">

   
      </div>

      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Produtos</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Código de barras</th>
                    <th>Nome</th>
                    <th>Preço de venda</th>
                    <th>Qtd</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($order->products as $product)
                    <tr>
                      <td>{{$product->bar_code}}</td>
                      <td>{{$product->name}}</td>
                      <td>R$ {{number_format($product->sale_price, 2, ',', '.')}}</td>
                      <td>{{$product->quantity}}</td>
                     
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7y">Nenhum resultado encontrado</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Código de barras</th>
                    <th>Nome</th>
                    <th>Preço de venda</th>
                    <th>Qtd</th>
                  </tr>
                </tfoot>   
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </section>

        <section class="col-lg-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Lotes</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Código de barras</th>
                    <th>Nome</th>
                    <th>Preço de venda</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($order->batchs()->get() as $batch)
                    <tr>
                      <td>{{$batch->batch_code}}</td>
                      <td>{{$batch->name}}</td>
                      <td>R$ {{number_format($product->sale_price, 2, ',', '.')}}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7y">Nenhum resultado encontrado</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Código de barras</th>
                    <th>Nome</th>
                    <th>Preço de venda</th>
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

    </section>
    <!-- /.content -->
  </div>


@stop