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
                                    <input type="checkbox" id="isSpecial" name="isSpecial" class="isSpecial"
                                        {{$candidate->special != null ? "checked" : ""}}>
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
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formação</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Nível</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Conclusão</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($candidate->formations as $formation)
                                <tr>
                                    <td>{{$formation->name}}</td>
                                    <td>{{$formation->level->name}}</td>
                                    <td>{{$formation->course->name}}</td>
                                    <td>{{ucfirst($formation->situation)}}</td>
                                    <td>{{$formation->situation == 'trancado' ? "Trancado" : str_pad($formation->finish_month, 2, "0", STR_PAD_LEFT) ."/".$formation->finish_year}}
                                    </td>
                                    <td>
                                        <a href="#" title="Editar" data-formation=""
                                            class="act-list act-list-blue act-formation-edit"
                                            data-formation-id="{{$formation->id}}"
                                            data-formation-name="{{$formation->name}}"
                                            data-formation-country_id="{{$formation->country_id}}"
                                            data-formation-state_id="{{$formation->state_id}}"
                                            data-formation-level_id="{{$formation->level_id}}"
                                            data-formation-course_id="{{$formation->course_id}}"
                                            data-formation-situation="{{$formation->situation}}"
                                            data-formation-start_month="{{$formation->start_month}}"
                                            data-formation-start_year="{{$formation->start_year}}"
                                            data-formation-finish_month="{{$formation->finish_month}}"
                                            data-formation-finish_year="{{$formation->finish_year}}">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.formation.delete', ['formation'=> $formation])}}"
                                            title="Editar" data-formation="" class="act-list act-list-red act-delete">
                                            <i class="fa f fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">Não possui nenhuma formação cadastrada</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Experiência Profissional</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th scope="col">Nome Empresa</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Nível hierárquico</th>
                                    <th scope="col">Data início</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($candidate->professionals as $professional)
                                <tr>
                                    <td>{{$professional->name}}</td>
                                    <td>{{$professional->occupation}}</td>
                                    <td>{{$professional->hierarchy->name}}</td>
                                    <td>{{str_pad($professional->start_month, 2, "0", STR_PAD_LEFT) ."/".$professional->start_year}}
                                    </td>
                                    <td>
                                        <a href="#" title="Editar" data-formation=""
                                            class="act-list act-list-blue act-professional-edit"
                                            data-professional-id="{{$professional->id}}"
                                            data-professional-name="{{$professional->name}}"
                                            data-professional-occupation="{{$professional->occupation}}"
                                            data-professional-hierarchy_id="{{$professional->hierarchy_id}}"
                                            data-professional-description="{{$professional->description}}"
                                            data-professional-country_id="{{$professional->country_id}}"
                                            data-professional-state_id="{{$professional->state_id}}"
                                            data-professional-city_id="{{$professional->city_id}}"
                                            data-professional-start_month="{{$professional->start_month}}"
                                            data-professional-start_year="{{$professional->start_year}}"
                                            data-professional-finish_month="{{$professional->finish_month}}"
                                            data-professional-finish_year="{{$professional->finish_year}}">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.professional.delete', ['professional'=> $professional])}}"
                                            title="Editar" data-formation="" class="act-list act-list-red act-delete">
                                            <i class="fa f fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Não possui nenhuma experiência cadastrada</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Idiomas</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Idioma</th>
                                    <th scope="col">Nível</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($candidate->language_candidates as $lang)
                                <tr>
                                    <td>{{$lang->language->name}}</td>
                                    <td>{{$lang->level}}</td>
                                    </td>
                                    <td>
                                        <a href="#" title="Editar" data-formation=""
                                            class="act-list act-list-blue act-language-edit"
                                            data-language-id="{{$lang->id}}"
                                            data-language-language_id="{{$lang->language_id}}"
                                            data-language-level="{{$lang->level}}">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.language.delete', ['language'=> $lang])}}"
                                            title="Editar" data-formation="" class="act-list act-list-red act-delete">
                                            <i class="fa f fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Não possui nenhum idioma cadastrado</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Conhecimento em Informática</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Conhecimento</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($candidate->knowledges as $know)
                                <tr>
                                    <td>{{$know->knowledge->name}}</td>
                                    <td>{{$know->subknowledge->name}}</td>
                                    </td>
                                    <td>
                                        <a href="#" title="Editar" data-formation=""
                                            class="act-list act-list-blue act-knowledge-edit"
                                            data-knowledge-id="{{$know->id}}"
                                            data-knowledge-knowledge_id="{{$know->knowledge_id}}"
                                            data-knowledge-subknowledge_id="{{$know->subknowledge_id}}">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.knowledge.delete', ['knowledge'=> $know])}}"
                                            title="Editar" data-formation="" class="act-list act-list-red act-delete">
                                            <i class="fa f fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">Não possui nenhum conhecimento em informática cadastrado
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>

    </section>
    <!-- /.content -->
</div>
<!-- /.row (main row) -->

@stop
@section('scripts')
<script type="text/javascript">

    $('.act-formation-edit').on('click', function(e) {
    e.preventDefault();
    var formation_id = $(this).data('formation-id');
    var name = $(this).data('formation-name');
    var country_id = $(this).data('formation-country_id');
    var state_id = $(this).data('formation-state_id');
    var level_id = $(this).data('formation-level_id');
    var course_id = $(this).data('formation-course_id');
    var situation = $(this).data('formation-situation');
    var start_month = $(this).data('formation-start_month');
    var start_year = $(this).data('formation-start_year');
    var finish_month = $(this).data('formation-finish_month');
    var finish_year = $(this).data('formation-finish_year');

    $('#formationEditModal form input[name="formation_id"]').val(formation_id);
    $('#formationEditModal form input[name="name"]').val(name);
    $('#formationEditModal form select[name="country_id"]').val(country_id);
    $('#formationEditModal form select[name="state_id"]').val(state_id);
    $('#formationEditModal form select[name="level_id"]').val(level_id);
    $('#formationEditModal form select[name="course_id"]').val(course_id);
    $('#formationEditModal form select[name="situation"]').val(situation);
    $('#formationEditModal form select[name="start_month"]').val(start_month);
    $('#formationEditModal form select[name="start_year"]').val(start_year);
    $('#formationEditModal form select[name="finish_month"]').val(finish_month);
    $('#formationEditModal form select[name="finish_year"]').val(finish_year);
    getSituation(situation);

    $('#formationEditModal').modal('show');
});

$('.act-professional-edit').on('click', function(e) {
    e.preventDefault();
    var professional_id = $(this).data('professional-id');
    var name = $(this).data('professional-name');
    var occupation = $(this).data('professional-occupation');
    var hierarchy_id = $(this).data('professional-hierarchy_id');
    var description = $(this).data('professional-description');
    var country_id = $(this).data('professional-country_id');
    var state_id = $(this).data('professional-state_id');
    var city_id = $(this).data('professional-city_id');
    var start_month = $(this).data('professional-start_month');
    var start_year = $(this).data('professional-start_year');
    var finish_month = $(this).data('professional-finish_month');
    var finish_year = $(this).data('professional-finish_year');

    $('#professionalEditModal form input[name="professional_id"]').val(professional_id);
    $('#professionalEditModal form input[name="name"]').val(name);
    $('#professionalEditModal form input[name="occupation"]').val(occupation);
    $('#professionalEditModal form select[name="hierarchy_id"]').val(hierarchy_id);
    $('#professionalEditModal form textarea[name="description"]').val(description);
    $('#professionalEditModal form select[name="country_id"]').val(country_id);
    $('#professionalEditModal form select[name="state_id"]').val(state_id);
    $('#professionalEditModal form select[name="city_id"]').val(city_id);
    $('#professionalEditModal form select[name="start_month"]').val(start_month);
    $('#professionalEditModal form select[name="start_year"]').val(start_year);
    $('#professionalEditModal form select[name="finish_month"]').val(finish_month);
    $('#professionalEditModal form select[name="finish_year"]').val(finish_year);
    if (finish_year == null || finish_year == "") {
        actually = 1;
    } else {
        actually = 0;
    }
    $('#professionalEditModal form select[name="actually"]').val(actually);
    isActually(actually);
    $('#professionalEditModal').modal('show');
});

$('.act-language-edit').on('click', function(e) {
    e.preventDefault();
    var lang_id = $(this).data('language-id');
    var level = $(this).data('language-level');
    var language_id = $(this).data('language-language_id');

    $('#languageEditModal form input[name="lang_id"]').val(lang_id);
    $('#languageEditModal form select[name="level"]').val(level);
    $('#languageEditModal form select[name="language_id"]').val(language_id);

    $('#languageEditModal').modal('show');
});

$('.act-knowledge-edit').on('click', function(e) {
    e.preventDefault();
    var know_id = $(this).data('knowledge-id');
    var knowledge_id = $(this).data('knowledge-knowledge_id');
    var subknowledge_id = $(this).data('knowledge-subknowledge_id');

    $('#knowledgeEditModal form input[name="know_id"]').val(know_id);
    $('#knowledgeEditModal form select[name="knowledge_id"]').val(knowledge_id);
    $('#knowledgeEditModal form select[name="subknowledge_id"]').val(subknowledge_id);

    $('#knowledgeEditModal').modal('show');
});
$('.act-formation').on('click', function(e) {
    e.preventDefault();
    var candidate_id = $(this).data('candidate_id');

    $('#formationModal form input[name="candidate_id"]').val(candidate_id);

    $('#formationModal').modal('show');
});

$('.act-professional').on('click', function(e) {
    e.preventDefault();
    var candidate_id = $(this).data('candidate_id');

    $('#professionalModal form input[name="candidate_id"]').val(candidate_id);

    $('#professionalModal').modal('show');
});
$('.act-language').on('click', function(e) {
    e.preventDefault();
    var candidate_id = $(this).data('candidate_id');

    $('#languageModal form input[name="candidate_id"]').val(candidate_id);

    $('#languageModal').modal('show');
});

$('.act-knowledge').on('click', function(e) {
    e.preventDefault();
    var candidate_id = $(this).data('candidate_id');

    $('#knowledgeModal form input[name="candidate_id"]').val(candidate_id);

    $('#knowledgeModal').modal('show');
});
</script>
@endsection


@section('modals')
<!--Inclur formação-->
<div class="modal fade" tabindex="-1" role="dialog" id="formationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Formação</h4>
            </div>
            <form action="{{route('admin.formation.store')}}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="candidate_id" value="">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="name">Nome da Instituição</label>
                            <input type="text" name="name" placeholder="Nome da Instituição" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="country_id">País</label>
                            <select name="country_id" class="form-control country_id">
                                <option selected disabled hidden>País..</option>
                                @isset($countries)
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6 state_formation">
                            <label for="state_id">Estado</label>
                            <select name="state_id" class="form-control state_id">
                                <option selected disabled hidden>SELECIONE..</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="level_id">Nível</label>
                            <select name="level_id" class="form-control level_id">
                                <option selected disabled hidden>Nível..</option>
                                @isset($levels)
                                @foreach($levels as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="course_id">Curso..</label>
                            <select name="course_id" class="form-control course_id">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="situation">Situação</label>
                            <select name="situation" class="form-control situation">
                                <option selected disabled hidden>Situação..</option>
                                <option value="concluido">Concluído</option>
                                <option value="cursando">Cursando</option>
                                <option value="trancado">Trancado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="start_month">Mês Início</label>
                            <select name="start_month" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 0; $i < 12; $i++) <option value="{{$i + 1}}">{{$i +1}}</option>
                                    @endfor
                            </select>
                        </div>
                        <?php $y = date("Y");$y += 10?>
                        <div class="col-sm-3">
                            <label for="start_year">Ano Início</label>
                            <select name="start_year" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 1950; $i <= $y; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-sm-3 finish">
                            <label for="finish_month">Mês Conclusão</label>
                            <select name="finish_month" class="form-control">
                                <option selected disabled hidden> Selecione..</option>
                                @for($i = 0; $i < 12; $i++) <option value="{{$i + 1}}">{{$i +1}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-sm-3 finish">
                            <label for="finish_year">Ano Conclusão</label>
                            <select name="finish_year" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 1950; $i <= $y; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Incluir formação -->

<!--Editar formação-->
<div class="modal fade" tabindex="-1" role="dialog" id="formationEditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Formação</h4>
            </div>
            <form action="{{route('admin.formation.update')}}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="formation_id" value="">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="name">Nome da Instituição</label>
                            <input type="text" name="name" placeholder="Nome da Instituição" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="country_id">País</label>
                            <select name="country_id" class="form-control country_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($countries)
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6 state_formation">
                            <label for="state_id">Estado</label>
                            <select name="state_id" class="form-control state_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($states)
                                @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="level_id">Nível</label>
                            <select name="level_id" class="form-control level_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($levels)
                                @foreach($levels as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="course_id">Curso..</label>
                            <select name="course_id" class="form-control course_id">
                                @isset($courses)
                                @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="situation">Situação</label>
                            <select name="situation" class="form-control situation">
                                <option selected disabled hidden>Situação..</option>
                                <option value="concluido">Concluído</option>
                                <option value="cursando">Cursando</option>
                                <option value="trancado">Trancado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="start_month">Mês Início</label>
                            <select name="start_month" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 0; $i < 12; $i++) <option value="{{$i + 1}}">{{$i +1}}</option>
                                    @endfor
                            </select>
                        </div>
                        <?php $y = date("Y");$y += 10?>
                        <div class="col-sm-3">
                            <label for="start_year">Ano Início</label>
                            <select name="start_year" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 1950; $i <= $y; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-sm-3 finish">
                            <label for="finish_month">Mês Conclusão</label>
                            <select name="finish_month" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 0; $i < 12; $i++) <option value="{{$i + 1}}">{{$i +1}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-sm-3 finish">
                            <label for="finish_year">Ano Conclusão</label>
                            <select name="finish_year" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 1950; $i <= $y; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Editar formação -->

<!--Incluir experiencia profissional-->
<div class="modal fade" id="professionalModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Experiência Profissional</h4>
            </div>
            <form method="POST" action="{{route('admin.professional.store')}}">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="candidate_id" value="">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="name">Nome da Empresa</label>
                            <input type="text" name="name" placeholder="Nome da Empresa" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="occupation">Cargo</label>
                            <input type="text" name="occupation" placeholder="Indique seu Cargo.." class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="hierarchy_id">Nível Hierárquico</label>
                            <select id="hierarchy_id" name="hierarchy_id" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @isset($hierarchies)
                                @foreach($hierarchies as $hierarchy)
                                <option value="{{$hierarchy->id}}">{{$hierarchy->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="description">Descrição das Atividadees</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="country_id">País</label>
                            <select name="country_id" class="form-control country_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($countries)
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6 state_professional">
                            <label for="state_id">Estado</label>
                            <select name="state_id" class="form-control state_id">
                                <option selected disabled hidden>SELECIONE..</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 city_professional">
                            <label for="city_id">Cidade</label>
                            <select name="city_id" class="form-control city_id">
                                <option selected disabled hidden>SELECIONE..</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="actually">Atual</label>
                              <select name="actually" class="form-control actually">
                                <option selected disabled hidden>SELECIONE..</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="start_month">Mês Início</label>
                            <select name="start_month" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 0; $i < 12; $i++) <option value="{{$i + 1}}">{{$i +1}}</option>
                                    @endfor
                            </select>
                        </div>
                        <?php $y = date("Y");$y += 10?>
                        <div class="col-sm-3">
                            <label for="start_year">Ano Início</label>
                            <select name="start_year" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 1950; $i <= $y; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-sm-3 finish">
                            <label for="finish_month">Mês Saída</label>
                            <select name="finish_month" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 0; $i < 12; $i++) <option value="{{$i + 1}}">{{$i +1}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-sm-3 finish">
                                <label for="finish_year">Ano Saída</label>
                            <select name="finish_year" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 1950; $i <= $y; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Incluir experiencia profissional-->

<!--Editar experiencia profissional-->
<div class="modal fade" id="professionalEditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Experiência Profissional</h4>
            </div>
            <form method="POST" action="{{route('admin.professional.update')}}">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="professional_id" value="">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="name">Nome da Empresa</label>
                            <input type="text" name="name" placeholder="Nome da Empresa" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="occupation">Cargo</label>
                            <input type="text" name="occupation" placeholder="Indique seu Cargo.." class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="hierarchy_id">Nível Hierárquico</label>
                            <select id="hierarchy_id" name="hierarchy_id" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @isset($hierarchies)
                                @foreach($hierarchies as $hierarchy)
                                <option value="{{$hierarchy->id}}">{{$hierarchy->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="description">Descrição das Atividades</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="country_id">País</label>
                            <select name="country_id" class="form-control country_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($countries)
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6 state_professional">
                            <label for="state_id">Estado</label>
                            <select name="state_id" class="form-control state_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($states)
                                @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 city_professional">
                            <label for="city_id">Cidade</label>
                            <select name="city_id" class="form-control city_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($cities)
                                @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="actually">Atual</label>
                              <select name="actually" class="form-control actually">
                                <option selected disabled hidden>SELECIONE..</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="start_month">Mês Início</label>
                            <select name="start_month" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 0; $i < 12; $i++) <option value="{{$i + 1}}">{{$i +1}}</option>
                                    @endfor
                            </select>
                        </div>
                        <?php $y = date("Y");$y += 10?>
                        <div class="col-sm-3">
                            <label for="start_year">Ano Início</label>
                            <select name="start_year" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 1950; $i <= $y; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-sm-3 finish">
                            <label for="finish_month">Mês Saída</label>
                            <select name="finish_month" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 0; $i < 12; $i++) <option value="{{$i + 1}}">{{$i +1}}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-sm-3 finish">
                                <label for="finish_year">Ano Saída</label>
                            <select name="finish_year" class="form-control">
                                <option selected disabled hidden>Selecione..</option>
                                @for($i = 1950; $i <= $y; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Editar experiencia profissional-->

<!--Inclur idioma-->
<div class="modal fade" tabindex="-1" role="dialog" id="languageModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Idioma</h4>
            </div>
            <form action="{{route('admin.language.store')}}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="candidate_id" value="">
                   
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="language_id">Idioma</label>
                            <select name="language_id" class="form-control">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($languages)
                                @foreach($languages as $language)
                                <option value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="level">Nível</label>
                            <select name="level" class="form-control">
                                <option selected disabled hidden>SELECIONE..</option>
                                <option value="Básico">Básico</option>
                                <option value="Intermediário">Intermediário</option>
                                <option value="Avançado">Avançado</option>
                                <option value="Fluente">Fluente</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Incluir Idioma -->

<!--Editar idioma-->
<div class="modal fade" tabindex="-1" role="dialog" id="languageEditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Idioma</h4>
            </div>
            <form action="{{route('admin.language.update')}}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="lang_id" value="">
                   
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="language_id">Idioma</label>
                            <select name="language_id" class="form-control">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($languages)
                                @foreach($languages as $language)
                                <option value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="level">Nível</label>
                            <select name="level" class="form-control">
                                <option selected disabled hidden>SELECIONE..</option>
                                <option value="Básico">Básico</option>
                                <option value="Intermediário">Intermediário</option>
                                <option value="Avançado">Avançado</option>
                                <option value="Fluente">Fluente</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Editar Idioma -->

<!--Incluir Conhecimento-->
<div class="modal fade" tabindex="-1" role="dialog" id="knowledgeModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Conhecimento em Informática</h4>
            </div>
            <form action="{{route('admin.knowledge.store')}}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="candidate_id" value="">
                   
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="knowledge_id">Tipo</label>
                            <select name="knowledge_id" class="form-control knowledge_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($knowledges)
                                @foreach($knowledges as $knowledge)
                                <option value="{{$knowledge->id}}">{{$knowledge->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6 subknowledge_know">
                            <label for="subknowledge_id">Habilidade</label>
                            <select name="subknowledge_id" class="form-control subknowledge_id">
                                <option selected disabled hidden>SELECIONE..</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Incluir Conhecimento -->

<!--Editar Conhecimento-->
<div class="modal fade" tabindex="-1" role="dialog" id="knowledgeEditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Conhecimento em Informática</h4>
            </div>
            <form action="{{route('admin.knowledge.update')}}" method="POST">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="know_id" value="">
                   
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="knowledge_id">Tipo</label>
                            <select name="knowledge_id" class="form-control knowledge_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($knowledges)
                                @foreach($knowledges as $knowledge)
                                <option value="{{$knowledge->id}}">{{$knowledge->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="col-sm-6 subknowledge_know">
                            <label for="subknowledge_id">Habilidade</label>
                            <select name="subknowledge_id" class="form-control subknowledge_id">
                                <option selected disabled hidden>SELECIONE..</option>
                                @isset($subknowledges)
                                @foreach($subknowledges as $subknowledge)
                                <option value="{{$subknowledge->id}}">{{$subknowledge->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Editar Conhecimento -->

@endsection