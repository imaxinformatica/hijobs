@extends('admin.templates.default')

@section('title', 'Configurações')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Configurações</h1>
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
                    <form method="POST" action="{{route('admin.configuration.update')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group  row">
                                <div class="col-xs-12">
                                    <label for="name">Nome</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-xs-12">
                                    <label for="email">E-mail</label>
                                    <input class="form-control" type="email" name="email" id="email"
                                        value="{{$user->email}}">
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
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Criação de vagas</h3>
                    </div>
                    <form method="POST" action="{{route('admin.configuration.limit')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group  row">
                                <div class="col-xs-12">
                                    <label for="qty">Limite para criação de vagas </label>
                                    <input class="form-control" type="text" name="qty" id="qty" value="{{$limit->qty}}">
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
    </section>
</div>
@stop