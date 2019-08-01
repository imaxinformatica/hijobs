@extends('admin.templates.default')

@section('title', ' Perguntas Frequentes')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1> Perguntas Frequentes</h1>
        </div>
        <div class="col-sm-6">
          <button class="btn-header btn-back" onclick="window.location.href='{{ route('admin.pages')}}'">Voltar</button>
          <button class="btn-header" onclick="window.location.href='{{ route('admin.frequently.create')}}'">Novo</button>
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
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Perguntas Frequentes</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Pergunta</th>
                    <th>Resposta</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($frequentlys as $frequently)
                    <tr>
                      <td><?php echo $frequently->question ?></td>
                      <td><?php echo substr($frequently->answer, 0, 100) ?>...</td>
                      <td>
                        <a href="{{ route('admin.frequently.edit', ['id' => $frequently->id])}}" title="Editar" class="act-list">
                          <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  @empty
                  @endforelse
                </tbody>
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