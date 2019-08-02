@extends('admin.templates.default')

@section('title', 'Vídeos')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (video header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Vídeos</h1>
        </div>
        <div class="col-sm-6">
          <button class="btn-header" onclick="window.location.href='{{ route('admin.video.create')}}'">Novo</button>
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
              <h3 class="box-title">Lista de Vídeos</h3>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Vídeo</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($videos as $video)
                    <tr>
                      <td>{{$video->name}}</td>
                      <td>
                        <a href="{{ route('admin.video.edit', ['id' => $video->id])}}" title="Editar" class="act-list">
                          <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('admin.video.delete', ['id' => $video->id])}}" title="Editar" class="act-list act-delete">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  @empty
                  <tr>
                    <td>Não existes videos criados até o momento</td>
                  </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Vídeo</th>
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