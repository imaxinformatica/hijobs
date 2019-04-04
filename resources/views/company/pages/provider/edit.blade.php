@extends('admin.templates.default')

@section('title', 'Editar Fornecedor')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Editar Cliente</h1>
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
            <form method="POST" action="{{route('admin.provider.update')}}">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$provider->id}}">
              <div class="box-body">
                <div class="form-group row box-razao-social">
                  <div class="col-xs-12">
                    <label for="company_name">Razão Social</label>
                    <input type="text" name="company_name" class="form-control" id="company_name" value="{{$provider->company_name}}">
                  </div>
                </div>
                <div class="form-group row box-nome" >
                  <div class="col-xs-12">
                    <label for="trade">Nome Fantasia</label>
                    <input type="text" name="trade" class="form-control" id="trade" value="{{$provider->trade}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 box-cnpj">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" class="form-control input-cnpj" id="cnpj" value="{{$provider->cnpj}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$provider->email}}" required>
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-8">
                    <label for="zip_code">CEP</label>
                    <input type="text" name="zip_code" class="form-control input-cep" id="zip_code" value="{{$provider->zip_code}}" required>
                  </div>
                  <div class="col-sm-4">
                    <label for="state">UF</label>
                    <select class="form-control" id="state" name="state" required>
                      <option></option>
                      <option value="AC" <?php if($provider->state == 'AC'){ echo 'selected'; } ?> >AC</option>
                      <option value="AL" <?php if($provider->state == 'AL'){ echo 'selected'; } ?> >AL</option>
                      <option value="AM" <?php if($provider->state == 'AM'){ echo 'selected'; } ?> >AM</option>
                      <option value="AP" <?php if($provider->state == 'AP'){ echo 'selected'; } ?> >AP</option>
                      <option value="BA" <?php if($provider->state == 'BA'){ echo 'selected'; } ?> >BA</option>
                      <option value="CE" <?php if($provider->state == 'CE'){ echo 'selected'; } ?> >CE</option>
                      <option value="DF" <?php if($provider->state == 'DF'){ echo 'selected'; } ?> >DF</option>
                      <option value="ES" <?php if($provider->state == 'ES'){ echo 'selected'; } ?> >ES</option>
                      <option value="GO" <?php if($provider->state == 'GO'){ echo 'selected'; } ?> >GO</option>
                      <option value="MA" <?php if($provider->state == 'MA'){ echo 'selected'; } ?> >MA</option>
                      <option value="MG" <?php if($provider->state == 'MG'){ echo 'selected'; } ?> >MG</option>
                      <option value="MS" <?php if($provider->state == 'MS'){ echo 'selected'; } ?> >MS</option>
                      <option value="MT" <?php if($provider->state == 'MT'){ echo 'selected'; } ?> >MT</option>
                      <option value="PA" <?php if($provider->state == 'PA'){ echo 'selected'; } ?> >PA</option>
                      <option value="PB" <?php if($provider->state == 'PB'){ echo 'selected'; } ?> >PB</option>
                      <option value="PE" <?php if($provider->state == 'PE'){ echo 'selected'; } ?> >PE</option>
                      <option value="PI" <?php if($provider->state == 'PI'){ echo 'selected'; } ?> >PI</option>
                      <option value="PR" <?php if($provider->state == 'PR'){ echo 'selected'; } ?> >PR</option>
                      <option value="RJ" <?php if($provider->state == 'RJ'){ echo 'selected'; } ?> >RJ</option>
                      <option value="RN" <?php if($provider->state == 'RN'){ echo 'selected'; } ?> >RN</option>
                      <option value="RO" <?php if($provider->state == 'RO'){ echo 'selected'; } ?> >RO</option>
                      <option value="RR" <?php if($provider->state == 'RR'){ echo 'selected'; } ?> >RR</option>
                      <option value="RS" <?php if($provider->state == 'RS'){ echo 'selected'; } ?> >RS</option>
                      <option value="SC" <?php if($provider->state == 'SC'){ echo 'selected'; } ?> >SC</option>
                      <option value="SE" <?php if($provider->state == 'SE'){ echo 'selected'; } ?> >SE</option>
                      <option value="SP" <?php if($provider->state == 'SP'){ echo 'selected'; } ?> >SP</option>
                      <option value="TO" <?php if($provider->state == 'TO'){ echo 'selected'; } ?> >TO</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="city">Cidade</label>
                    <input type="text" name="city" class="form-control" id="city" value="{{$provider->city}}" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="district">Bairro</label>
                    <input type="text" name="district" class="form-control" id="district" value="{{$provider->district}}" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-9">
                    <label for="address">Endereço</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{$provider->address}}" required>
                  </div>
                  <div class="col-sm-3">
                    <label for="address_number">Número</label>
                    <input type="text" name="address_number" class="form-control" id="address_number" value="{{$provider->address_number}}" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="phone">Telefone principal</label>
                    <input type="text" name="phone" class="form-control input-telefone" id="phone" value="{{$provider->phone}}" required>
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
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@stop