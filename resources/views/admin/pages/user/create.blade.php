@extends('admin.templates.default')

@section('title', 'Adicionar Usuário')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar Usuário</h1>
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
            <form method="POST" action="{{route('admin.user.store')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row box-nome">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row" >
                  <div class="col-xs-12">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}">
                  </div>
                </div>
              <div class="form-group row">
                <div class="col-sm-4">
                    <label for="user_type">Tipo de Usuário</label>
                    <select class="form-control" id="user_type" name="user_type" required>
                      <option disabled selected></option>
                      <option value="1" <?php if(old('user_type') == '1'){ echo 'selected'; } ?> >Admin</option>
                      <option value="2" <?php if(old('user_type') == '2'){ echo 'selected'; } ?> >Colaborador</option>
                    </select>
                  </div>
                  <div class="col-sm-8">
                    <label for="password">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{old('password')}}">
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