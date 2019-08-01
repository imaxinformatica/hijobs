@extends('admin.templates.default')

@section('title', 'Editar Candidato')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Editar Candidato</h1>
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
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{$candidate->name}}">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-xs-12">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{$candidate->email}}">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-xs-3">
                                    <label for="cep">CEP</label>
                                    <input type="text" name="cep" class="form-control" id="cep"
                                        value="{{$candidate->cep}}">
                                </div>
                                <div class="col-xs-7">
                                    <label for="street">Logradouro</label>
                                    <input type="text" name="street" class="form-control" id="street"
                                        value="{{$candidate->street}}">
                                </div>
                                <div class="col-xs-2">
                                    <label for="number">Número</label>
                                    <input type="text" name="number" class="form-control" id="number"
                                        value="{{$candidate->number}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-4">
                                    <label for="nehighbor">Bairro</label>
                                    <input type="text" name="nehighbor" class="form-control" id="nehighbor"
                                        value="{{$candidate->nehighbor}}">
                                </div>
                                <div class="col-xs-4">
                                    <label for="city">Cidade</label>
                                    <input type="text" name="city" class="form-control" id="city"
                                        value="{{$candidate->city}}">
                                </div>
                                <div class="col-xs-4">
                                    <label for="state">Estado</label>
                                    <select name="state" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}"
                                            <?php if ($state->id == $candidate->state): echo "selected"; endif; ?>>
                                            {{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" class="form-control input-cpf" id="cpf"
                                        value="{{$candidate->cpf}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone">Telefone</label>
                                    <input type="text" name="phone" class="form-control input-phone" id="phone"
                                        value="{{$candidate->phone}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="birthdate">Data de Nascimento</label>
                                    <input type="text" name="birthdate" class="form-control input-date" id="birthdate"
                                        value="{{$candidate->birthdate}}">
                                </div>
                                <div class="col-xs-4">
                                    <label for="marital_status">Estado civil</label>
                                    <select name="marital_status" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        <option value="Solteiro"
                                            <?php if ($candidate->marital_status == "Solteiro"): echo "selected"; endif; ?>>
                                            Solteiro</option>
                                        <option value="Casado"
                                            <?php if ($candidate->marital_status == "Casado"): echo "selected"; endif; ?>>
                                            Casado</option>
                                        <option value="Divorciado"
                                            <?php if ($candidate->marital_status == "Divorciado"): echo "selected"; endif; ?>>
                                            Divorciado</option>
                                        <option value="Viúvo"
                                            <?php if ($candidate->marital_status == "Viúvo"): echo "selected"; endif; ?>>
                                            Viúvo</option>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <label for="sex">Sexo</label>
                                    <select name="sex" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        <option value="M" <?php if ($candidate->sex == "M"): echo "selected"; endif; ?>>
                                            Masculino</option>
                                        <option value="F" <?php if ($candidate->sex == "F"): echo "selected"; endif; ?>>
                                            Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <input type="checkbox" id="isSpecial" name="isSpecial" class="isSpecial" {{$candidate->special != null ? "checked" : ""}}>
                                    <label for="isSpecial">Pessoa com deficiência física</label>
                                </div>
                            </div>
                            <div id="special">
                                <div class="row form-group">
                                    <div class="col-sm-12">
                                        @foreach($specials as $special)
                                        <input value="{{$special->id}}" id="{{$special->name}}" type="checkbox"
                                            name="specials[]"
                                            {{$candidate->specials()->where('specials.id', $special->id)->count() > 0 ? "checked" : ""}}>
                                        <label for="{{$special->name}}">{{$special->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-xs-12">
                                        <label for="special_description">Condições especiais</label>
                                        <textarea name="special_description" class="form-control"
                                            placeholder="Descreva condições especiais de transporte, trabalho, acompanhamento etc.">{{$candidate->special_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Redes sociais</h4>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control"
                                        value="{{$candidate->linkedin}}" placeholder="Informe a url do seu perfil">
                                </div>
                                <div class="col-sm-6">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control"
                                        value="{{$candidate->facebook}}" placeholder="Informe a url do seu perfil">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" class="form-control"
                                        value="{{$candidate->twitter}}" placeholder="Informe a url do seu perfil">

                                </div>
                                <div class="col-sm-6">
                                    <label for="blog">Blog</label>
                                    <input type="text" name="blog" class="form-control" value="{{$candidate->blog}}"
                                        placeholder="Informe a url do seu perfil">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Informações complementares</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="info-adc" style="margin-top: 20px;">Tipo de habilitação para
                                        dirigir</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                @foreach($drivers as $driver)
                                <div class="col-sm-2">
                                    <input value="{{$driver->id}}" type="checkbox" id="{{$driver->id}}" name="driver[]"
                                        {{$candidate->driver()->where('drivers.id', $driver->id)->count() > 0 ? "checked" : ""}}>
                                    <label for="{{$driver->id}}">{{$driver->name}}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="info-adc" style="margin-top: 20px;">Possui veículo próprio?
                                        Qual?</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                @foreach($vehicles as $vehicle)
                                <div class="col-sm-3">
                                    <input value="{{$vehicle->id}}" type="checkbox" id="{{$vehicle->name}}"
                                        name="vehicle[]"
                                        {{$candidate->vehicle()->where('vehicles.id', $vehicle->id)->count() > 0 ? "checked" : ""}}>
                                    <label for="{{$vehicle->name}}">{{$vehicle->name}}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="info-adc" style="margin-top: 20px;">Tem disponibilidade para
                                        viajar?</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    <input value="1" id="travel1" type="radio"
                                        <?php if ($candidate->travel == "1"): echo "checked"; endif; ?> name="travel">
                                    <label for="travel1">Sim</label>
                                    <input value="0" id="travel0" type="radio"
                                        <?php if ($candidate->travel == "0"): echo "checked"; endif; ?> name="travel">
                                    <label for="travel0">Não</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="info-adc" style="margin-top: 20px;">Tem disponibilidade para mudar de
                                        residência?</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12">
                                    <input value="1" id="change1" type="radio"
                                        <?php if ($candidate->change == "1"): echo "checked"; endif; ?> name="change">
                                    <label for="change1">Sim</label>
                                    <input value="0" id="change0" type="radio"
                                        <?php if ($candidate->change == "0"): echo "checked"; endif; ?> name="change">
                                    <label for="change0">Não</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Objetivos profissionais</h4>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="journey_id">Jornada</label>
                                    <select name="journey_id" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        @foreach($journeys as $journey)
                                        <option value="{{$journey->id}}"
                                            <?php if ($candidate->journey_id == $journey->id): echo "selected"; endif; ?>>
                                            {{$journey->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contract_type_id">Tipo de contrato</label>
                                    <select name="contract_type_id" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        @foreach($contract_types as $contract)
                                        <option value="{{$contract->id}}"
                                            <?php if ($candidate->contract_type_id == $contract->id): echo "selected"; endif; ?>>
                                            {{$contract->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="min_hierarchy_id">Nível hierárquico mínimo</label>
                                    <select name="min_hierarchy_id" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        @foreach($hierarchies as $hierarchy)
                                        <option value="{{$hierarchy->id}}"
                                            <?php if ($candidate->min_hierarchy_id == $hierarchy->id): echo "selected"; endif; ?>>
                                            {{$hierarchy->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="max_hierarchy_id">Nível hierárquico máximo</label>
                                    <select name="max_hierarchy_id" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        @foreach($hierarchies as $hierarchy)
                                        <option value="{{$hierarchy->id}}"
                                            <?php if ($candidate->max_hierarchy_id == $hierarchy->id): echo "selected"; endif; ?>>
                                            {{$hierarchy->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="salary">Pretenção salarial mínima</label>
                                    <input type="text" value="{{number_format($candidate->salary, 2, ',', '.')}}"
                                        class="input-money form-control" name="salary" placeholder="Ex:. 2500">
                                </div>
                                <div class="col-sm-6">
                                    <label for="state_work">Estado onde deseja trabalhar</label>
                                    <select name="state_work[]" class="state-work form-control" multiple="multiple">
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}"
                                            {{$candidate->stateWork()->where('states.id', $state->id)->count() > 0 ? "selected" : ""}}>
                                            {{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="{{route('admin.candidate')}}">
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