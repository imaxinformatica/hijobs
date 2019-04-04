@extends('admin.templates.default')

@section('title', 'Editar Usuário')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Editar Usuário</h1>
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
            <form method="POST" action="{{route('admin.user.update')}}">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$user->id}}">
              <div class="box-body">
                <div class="form-group row box-nome">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                  </div>
                </div>
                <div class="form-group row" >
                  <div class="col-xs-12">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">
                  </div>
                </div>
              <div class="form-group row">
                <div class="col-sm-4">
                    <label for="user_type">Tipo de Usuário</label>
                    <select class="form-control" id="user_type" name="user_type" required>
                      <option disabled selected></option>
                      <option value="1" <?php if($user->user_type == '1'){ echo 'selected'; } ?> >Admin</option>
                      <option value="2" <?php if($user->user_type == '2'){ echo 'selected'; } ?> >Colaborador</option>
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
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@stop