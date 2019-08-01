@extends('admin.templates.default')

@section('title', 'Editar Cliente')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (frequently header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Criar Pergunta Frequente</h1>
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
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.frequently.store')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="question" style="margin-top: 20px;">Pergunta</label>
                    <textarea name="question" required class="form-control medium-text-editor" rows="5" placeholder="Conteúdo da Página">{{ old('question')}}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="answer" style="margin-top: 20px;">Resposta</label>
                    <textarea name="answer" required class="form-control medium-text-editor" rows="5" placeholder="Conteúdo da Página">{{old('answer')}}</textarea>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{route('admin.frequentlys')}}">
                  <button type="button" class="btn btn-default">Voltar</button>
                </a>
              </div>
            </form>
          </div>
        </section>
      </div>
    </section>
  </div>

  </section>
  <!-- /.content -->
  </div>
  <!-- /.row (main row) -->

  </div>

@stop