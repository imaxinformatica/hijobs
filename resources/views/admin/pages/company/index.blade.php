@extends('admin.templates.default')

@section('title', 'Empresas')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Empresas</h1>
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
      <div class="row">
        <section class="col-lg-12">
          <div class="box">
              <form id="filterForm" method="GET" autocomplete="off">
              <div class="box-header">
                <h3 class="box-title">Filtrar resultados</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-4">
                    <label>Razão social</label>
                    <input type="text" name="company_name" value="{{request('company_name')}}" class="form-control">
                  </div>
                  <div class="col-sm-4">
                    <label>Nome fantasia</label>
                    <input type="text" name="trade" value="{{request('trade')}}" class="form-control">
                  </div>
                  <div class="col-sm-4">
                    <label>CNPJ</label>
                    <input type="text" name="cnpj" value="{{request('cnpj')}}" class="form-control input-cnpj">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <button type="button" class="btn btn-default clear-filters">Limpar</button>
              </div>
            </form>
        </section>
      </div>

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Empresas</h3>
              <div class="box-tools">
                <?php

                $paginate = $companies;

                $link_limit = 7;

                $filters = '&company_name='.request('company_name');
                $filters .= '&trade='.request('trade');
                $filters .= '&cnpj='.request('cnpj');

                ?>

                
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Razão social</th>
                    <th>Nome fantasia</th>
                    <th>CNPJ</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($companies as $company)
                    <tr>
                      <td>{{$company->trade}}</td>
                      <td>{{$company->name}}</td>
                      <td>{{$company->cnpj}}</td>
                      <td>{{$company->email}}</td>
                      <td>{{$company->phone}}</td>
                      <td>
                        <a href="{{ route('admin.company.edit', ['id' => $company->id])}}" title="Editar" class="act-list">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        @if($company->publish == 1)

                        <a href="{{ route('admin.company.remove', ['id' => $company->id])}}" title="Disponibilizar na Home" class="act-list act-delete">
                          <i class="fa fa-window-close-o" aria-hidden="true"></i>
                        </a>
                        @else
                        <a href="{{ route('admin.company.show', ['id' => $company->id])}}" title="Disponibilizar na Home" class="act-list act-delete">
                          <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </a>
                        @endif
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7y">Nenhum resultado encontrado</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Razão social</th>
                    <th>Nome fantasia</th>
                    <th>CNPJ</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>
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

@stop