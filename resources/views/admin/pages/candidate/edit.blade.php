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
            <form method="POST" action="{{route('admin.candidate.update')}}">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$candidate->id}}">
              <div class="box-body">
                <div class="form-group row ">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$candidate->name}}">
                  </div>
                </div>
                <div class="form-group row ">
                  <div class="col-xs-12">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$candidate->email}}">
                  </div>
                </div>
                <div class="form-group row ">
                  <div class="col-xs-3">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" class="form-control" id="cep" value="{{$candidate->cep}}">
                  </div>
                  <div class="col-xs-7">
                    <label for="street">Logradouro</label>
                    <input type="text" name="street" class="form-control" id="street" value="{{$candidate->street}}">
                  </div>
                  <div class="col-xs-2">
                    <label for="number">Número</label>
                    <input type="text" name="number" class="form-control" id="number" value="{{$candidate->number}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-4">
                    <label for="nehighbor">Bairro</label>
                    <input type="text" name="nehighbor" class="form-control" id="nehighbor">
                  </div>
                  <div class="col-xs-4">
                    <label for="city">Cidade</label>
                    <input type="text" name="city" class="form-control" id="city">
                  </div>
                  <div class="col-xs-4">
                    <label for="state_id">Estado</label>
                      <select name="state_id" class="form-control">
                          <option selected disabled>Selecione</option>
                          @foreach($states as $state)
                          <option value="{{$state->id}}" <?php if ($state->id == $candidate->state_id): echo "selected"; endif; ?>>{{$state->name}}</option>
                          @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group row" >
                  <div class="col-xs-6">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" value="{{$candidate->cpf}}">
                  </div>
                  <div class="col-sm-6">
                    <label for="phone">Telefone</label>
                    <input type="text" name="phone" class="form-control input-phone" id="phone" value="{{$candidate->phone}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label for="birthdate">Data de Nascimento</label>
                    <input type="text" name="birthdate" class="form-control input-date" id="birthdate" value="{{$candidate->birthdate}}">
                  </div>
                  <div class="col-xs-4">
                    <label for="marital_status">Estado civil</label>
                    <select name="marital_status" class="form-control">
                      <option selected disabled>Selecione</option>
                      <option value="Solteiro" <?php if ($candidate->marital_status == "Solteiro"): echo "selected"; endif; ?>>Solteiro</option>
                      <option value="Casado" <?php if ($candidate->marital_status == "Casado"): echo "selected"; endif; ?>>Casado</option>
                      <option value="Divorciado" <?php if ($candidate->marital_status == "Divorciado"): echo "selected"; endif; ?>>Divorciado</option>
                      <option value="Viúvo" <?php if ($candidate->marital_status == "Viúvo"): echo "selected"; endif; ?>>Viúvo</option>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <label for="sex">Sexo</label>
                      <select name="sex" class="form-control">
                          <option selected disabled>Selecione</option>
                          <option value="M" <?php if ($candidate->sex == "M"): echo "selected"; endif; ?>>Masculino</option>
                          <option value="F" <?php if ($candidate->sex == "F"): echo "selected"; endif; ?>>Feminino</option>
                      </select>
                  </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h4>Redes sociais</h4>
                    </div>
                </div>

                <div class="form-group row" >
                  <div class="col-xs-6">
                    <label for="linkedin">Linkedin</label>
                    <input type="text" name="linkedin" class="form-control" value="{{$candidate->linkedin}}" placeholder="Informe a url do seu perfil">
                  </div>
                  <div class="col-sm-6">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{$candidate->facebook}}" placeholder="Informe a url do seu perfil">
                  </div>
                </div>

                <div class="form-group row" >
                  <div class="col-xs-6">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="{{$candidate->twitter}}" placeholder="Informe a url do seu perfil">
                  
                  </div>
                  <div class="col-sm-6">
                    <label for="blog">Blog</label>
                    <input type="text" name="blog" class="form-control" value="{{$candidate->blog}}" placeholder="Informe a url do seu perfil">
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                      <h4>Informações complementares</h4>
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
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <p>Número de Candidaturas</p>
                <h3>{{$candidate->opportunity->count()}}</h3>
              </div>
            </div>
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Candidaturas</h3>
              </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Vaga</th>
                      <th>Empresa</th>
                    </tr>
                      @forelse($candidate->opportunity as $opportunity)
                    <tr>
                      <td>{{$opportunity->name}}</td>
                      <td>{{$opportunity->company->name}}</td>
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