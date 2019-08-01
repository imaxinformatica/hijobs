@extends('admin.templates.default')

@section('title', 'Editar Conteúdo')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Editar Conteúdo</h1>
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
                    <form method="POST" action="{{route('admin.pages.update')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$page->id}}">
                        <div class="box-body">
                            <div class="form-group row ">
                                <div class="col-xs-12">
                                    <h4><b>{{$page->name}}</b></h4>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="desc" style="margin-top: 20px;">Conteudo da Págna</label>
                                    <textarea class="form-control medium-text-editor"
                                        name="desc">{{$page->desc}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="{{route('admin.pages')}}">
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