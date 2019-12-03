@extends('admin.templates.default')

@section('title', 'Candidatos')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Candidatos</h1>
            </div>
            <div class="col-sm-6">
                <button class="btn-header"
                    onclick="window.location.href='{{ route('admin.candidate.create')}}'">Novo</button>
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
                                    <label>Nome</label>
                                    <input type="text" name="name" value="{{request('name')}}" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>E-mail</label>
                                    <input type="text" name="email" value="{{request('email')}}" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>Telefone</label>
                                    <input type="text" name="phone" value="{{request('phone')}}"
                                        class="form-control input-phone">
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
                        <h3 class="box-title">Lista de Candidatos</h3>
                        <div class="box-tools">
                            <?php

                $paginate = $candidates;

                $link_limit = 7;

                $filters = '&candidate_name='.request('candidate_name');
                $filters .= '&trade='.request('trade');
                $filters .= '&cnpj='.request('cnpj');

                ?>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($candidates as $candidate)
                                <tr>
                                    <td>{{$candidate->name}}</td>
                                    <td>{{$candidate->cpf}}</td>
                                    <td>{{$candidate->email}}</td>
                                    <td>{{$candidate->phone}}</td>
                                    <td>
                                        <a href="{{ route('admin.candidate.edit', ['id' => $candidate->id])}}"
                                            title="Editar" class="act-list">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.candidate.send.data', ['candidate' => $candidate])}}"
                                            title="Enviar dados usuário" class="act-list">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>

                                        </a>
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
                                    <th>Nome</th>
                                    <th>CPF</th>
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