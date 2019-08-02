@extends('admin.templates.default')

@section('title', 'Editar Cliente')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Editar Cliente</h1>
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
            <form method="POST" action="{{route('admin.opportunities.update')}}">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$opportunity->id}}">
              <div class="box-body">
                <div class="form-group row box-razao-social">
                  <div class="col-xs-12">
                    <label for="name">Cargo</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$opportunity->name}}">
                   </div>
                </div>
                <div class="form-group row box-nome" >
                  <div class="col-xs-12">
                    <label for="activity" >Atividades a serem desenvolvidas</label>
                    <textarea name="activity" rows="4" class="form-control" placeholder="Descreva as atribuições e responsabilidades do cargo.">{{$opportunity->activity}}</textarea>
                  </div>
                </div>
                <div class="form-group row box-nome" >
                  <div class="col-xs-12">
                    <label for="requiriments" >Requisitos necessários</label>
                    <textarea name="requiriments" rows="4" class="form-control" placeholder="Descreva as atribuições e responsabilidades do cargo.">{{$opportunity->requiriments}}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 box-cnpj">
                    <label for="salary">Salário</label>
                    <input type="text" name="salary" class="form-control" value="{{number_format($opportunity->salary, '2', ',', '.')}}" class="input-money" placeholder="Salário">
                    <input type="checkbox" name="isCombining">
                    <label> A Combinar</label>
                  </div>
                  <div class="col-sm-6">
                    <label for="contract_type_id">Regime de Contratação</label>
                    <select name="contract_type_id" class="form-control">
                        <option selected disabled>Selecione</option>
                        @foreach($contract_types as $contract)
                        <option value="{{$contract->id}}" <?php if ($contract->id == $opportunity->contract_type_id) {echo "selected";}?>>{{$contract->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row box-razao-social">
                  <div class="col-xs-12">
                    <label for="time" style="margin-top: 20px;">Horário de trabalho</label>
                    <input type="text" name="time" class="form-control" value="{{$opportunity->time}}" placeholder="Ex.: De segunda a sexta, das 9h às 18h.">
                  </div>
                </div>
                <div class="form-group row box-nome" >
                  <div class="col-xs-12">
                    <label for="additionally" >Informações adicionais sobre a vaga</label>
                    <textarea name="additionally" rows="4" class="form-control" placeholder="Ex.: Disponibilidade para viagens, possuir veículo próprio, carteira própria de clientes...">{{$opportunity->additionally}}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-5">
                    <label for="state_id">Estado</label>
                    <select name="state_id" class="state form-control">
                        @foreach($states as $state)
                        <option value="{{$state->id}}" <?php if ($state->id == $opportunity->state_id) {echo "selected";}?>>{{$state->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-xs-5">
                    <label for="city_id">Cidade</label>
                    <select name="city_id" class="state form-control">
                        @foreach($states as $state)
                        <option value="{{$state->id}}" <?php if ($state->id == $opportunity->city_id) {echo "selected";}?>>{{$state->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <label for="num">Vagas</label>
                    <input type="text" placeholder="Ex: 5" class="form-control" value="{{$opportunity->num}}" name="num">
                  </div>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{route('admin.opportunities')}}">
                  <button type="button" class="btn btn-default">Voltar</button>
                </a>
              </div>
            </form>
          </div>
        </section>
        
        <section class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <p>Número de Candidatos</p>
                <h3>{{$opportunity->candidate()->count()}}</h3>
              </div>
            </div>
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Candidatos</h3>
              </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>E-mail</th>
                    </tr>
                      @forelse($opportunity->candidate as $candidate)
                    <tr>
                      <td>{{$candidate->name}}</td>
                      <td>{{$candidate->email}}</td>
                    </tr>
                      @empty
                      <tr>
                        <td colspan="7y">Nenhum resultado encontrado</td>
                      </tr>
                      @endforelse
                  </thead>
                  <tbody>
                      
                  </tbody>
                </table>
              </div>
            </div>
          </section>

      </section>
      <!-- /.content -->
      </div>
      <!-- /.row (main row) -->

  </div>

@stop