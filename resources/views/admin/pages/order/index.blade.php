@extends('admin.templates.default')

@section('title', 'Pedidos')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Pedidos</h1>
        </div>
        <div class="col-sm-6">
          <button class="btn-header" onclick="window.location.href='{{ route('admin.order.search')}}'">Novo</button>
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
                  <div class="col-sm-6">
                    <label>Número Pedido</label>
                    <input type="text" name="id" value="{{request('id')}}" class="form-control">
                  </div>
                  <div class="col-sm-6">
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
              <h3 class="box-title">Lista de Pedidos</h3>
              <div class="box-tools">
                <?php

                $paginate = $orders;

                $link_limit = 7;

                $filters = '&id='.request('id');
                $filters .= '&cnpj='.request('cnpj');

                ?>

                @if($paginate->lastPage() > 1)
                  <ul class="pagination pagination-sm no-margin pull-right">
                      <li class="{{ ($paginate->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $paginate->url(1) . $filters}}">«</a>
                      </li>
                      @for($i = 1; $i <= $paginate->lastPage(); $i++)
                          <?php
                          $half_total_links = floor($link_limit / 2);
                          $from = $paginate->currentPage() - $half_total_links;
                          $to = $paginate->currentPage() + $half_total_links;
                          if ($paginate->currentPage() < $half_total_links) {
                             $to += $half_total_links - $paginate->currentPage();
                          }
                          if ($paginate->lastPage() - $paginate->currentPage() < $half_total_links) {
                              $from -= $half_total_links - ($paginate->lastPage() - $paginate->currentPage()) - 1;
                          }
                          ?>
                          @if ($from < $i && $i < $to)
                              <li class="{{ ($paginate->currentPage() == $i) ? ' active' : '' }}">
                                  <a href="{{ $paginate->url($i) . $filters}}">{{ $i }}</a>
                              </li>
                          @endif
                      @endfor
                      <li class="{{ ($paginate->currentPage() == $paginate->lastPage()) ? ' disabled' : '' }}">
                          <a href="{{ $paginate->url($paginate->lastPage()) . $filters}}">»</a>
                      </li>
                  </ul>
                @endif
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Número Pedido</th>
                    <th>Nome Cliente</th>
                    <th>Valor Frete</th>
                    <th>Total Pedido</th>
                    <th>Status</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($orders as $order)
                    <tr>
                      <td>{{$order->id}}</td>
                      <td>{{$order->customer()->first()->company_name}}</td>
                      <td>R$ {{number_format($order->freight, 2, ',', '.')}}</td>
                      <td>R$ {{number_format($order->total_order, 2, ',', '.')}}</td>
                      <td>{{$order->statusOrder($order->id)}}</td>
                      <td>
                        @if($order->statusOrder($order->id) == 'Em aberto')
                        <a href="{{ route('admin.order.create', ['id' => $order->id])}}" title="Editar" class="act-list">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        @elseif($order->statusOrder($order->id) == 'Aguardando Pagamento' )
                        <a href="{{ route('admin.order.finish', ['id' => $order->id])}}" title="Editar" >
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        @else
                        <a href="{{ route('admin.order.show', ['id' => $order->id])}}" title="Visualizar" >
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if($order->statusOrder($order->id) == 'Em aberto' || $order->statusOrder($order->id) == 'Aguardando Pagamento' )
                         <a href="{{ route('admin.order.destroy', ['id' => $order->id])}}" title="Excluir" class="act-list act-delete">
                          <i class="fa fa-minus-square-o" aria-hidden="true"></i>
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
                    <th>Número Pedido</th>
                    <th>Nome Cliente</th>
                    <th>Valor Frete</th>
                    <th>Total Pedido</th>
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