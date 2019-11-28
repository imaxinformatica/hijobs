@extends('admin.templates.default')

@section('title', 'Adicionar Candidato')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Adicionar Candidato</h1>
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
    @if(session()->has('error'))
    <section class="content-header">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-sm-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('error')}}
                </div>
            </section>
        </div>
    </section>
    @endisset

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
                    <form method="POST" action="{{route('admin.candidate.store')}}">
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="form-group row ">
                                <div class="col-xs-12">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{old('name')}}" required>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-xs-12">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-xs-6">
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        value="{{old('password')}}">
                                </div>
                                <div class="col-xs-6">
                                    <label for="password_confirmation">Confirmação de senha</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                                        value="{{old('password_confirmation')}}">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-xs-3">
                                    <label for="cep">CEP</label>
                                    <input type="text" name="cep" class="form-control input-cep" id="cep" value="{{old('cep')}}">
                                </div>
                                <div class="col-xs-7">
                                    <label for="street">Logradouro</label>
                                    <input type="text" name="street" class="form-control" id="street"
                                        value="{{old('street')}}">
                                </div>
                                <div class="col-xs-2">
                                    <label for="number">Número</label>
                                    <input type="text" name="number" class="form-control" id="number"
                                        value="{{old('number')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-4">
                                    <label for="nehighbor">Bairro</label>
                                    <input type="text" name="nehighbor" class="form-control" id="nehighbor"
                                        value="{{old('nehighbor')}}">
                                </div>
                                <div class="col-xs-4">
                                    <label for="city">Cidade</label>
                                    <input type="text" name="city" class="form-control" id="city"
                                        value="{{old('city')}}">
                                </div>
                                <div class="col-xs-4">
                                    <label for="state">Estado</label>
                                    <select name="state" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}"
                                            <?php if ($state->id == old('state')): echo "selected"; endif; ?>>
                                            {{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" class="form-control input-cpf" id="cpf"
                                        value="{{old('cpf')}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone">Telefone</label>
                                    <input type="text" name="phone" class="form-control input-phone" id="phone"
                                        value="{{old('phone')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="birthdate">Data de Nascimento</label>
                                    <input type="text" name="birthdate" class="form-control input-date" id="birthdate"
                                        value="{{old('birthdate')}}">
                                </div>
                                <div class="col-xs-4">
                                    <label for="marital_status">Estado civil</label>
                                    <select name="marital_status" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        <option value="Solteiro"
                                            <?php if (old('marital_status') == "Solteiro"): echo "selected"; endif; ?>>
                                            Solteiro</option>
                                        <option value="Casado"
                                            <?php if (old('marital_status') == "Casado"): echo "selected"; endif; ?>>
                                            Casado</option>
                                        <option value="Divorciado"
                                            <?php if (old('marital_status') == "Divorciado"): echo "selected"; endif; ?>>
                                            Divorciado</option>
                                        <option value="Viúvo"
                                            <?php if (old('marital_status') == "Viúvo"): echo "selected"; endif; ?>>
                                            Viúvo</option>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <label for="sex">Sexo</label>
                                    <select name="sex" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        <option value="M" <?php if (old('sex') == "M"): echo "selected"; endif; ?>>
                                            Masculino</option>
                                        <option value="F" <?php if (old('sex') == "F"): echo "selected"; endif; ?>>
                                            Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <input type="checkbox" id="isSpecial" name="isSpecial" class="isSpecial"
                                        {{old('special') != null ? "checked" : ""}}>
                                    <label for="isSpecial">Pessoa com deficiência física</label>
                                </div>
                            </div>
                            <div id="special">
                                <div class="row form-group">
                                    <div class="col-sm-12">
                                        @foreach($specials as $special)
                                        <input value="{{$special->id}}" id="{{$special->name}}" type="checkbox"
                                            name="specials[]">
                                        <label for="{{$special->name}}">{{$special->name}}</label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-xs-12">
                                        <label for="special_description">Condições especiais</label>
                                        <textarea name="special_description" class="form-control"
                                            placeholder="Descreva condições especiais de transporte, trabalho, acompanhamento etc.">{{old('special_description')}}</textarea>
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
                                    <input type="text" name="linkedin" class="form-control" value="{{old('linkedin')}}"
                                        placeholder="Informe a url do seu perfil">
                                </div>
                                <div class="col-sm-6">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" value="{{old('facebook')}}"
                                        placeholder="Informe a url do seu perfil">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" class="form-control" value="{{old('twitter')}}"
                                        placeholder="Informe a url do seu perfil">

                                </div>
                                <div class="col-sm-6">
                                    <label for="blog">Blog</label>
                                    <input type="text" name="blog" class="form-control" value="{{old('blog')}}"
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
                                    <input value="{{$driver->id}}" type="checkbox" id="{{$driver->id}}" name="driver[]">
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
                                        name="vehicle[]">
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
                                        <?php if (old('travel') == "1"): echo "checked"; endif; ?> name="travel">
                                    <label for="travel1">Sim</label>
                                    <input value="0" id="travel0" type="radio"
                                        <?php if (old('travel') == "0"): echo "checked"; endif; ?> name="travel">
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
                                        <?php if (old('change') == "1"): echo "checked"; endif; ?> name="change">
                                    <label for="change1">Sim</label>
                                    <input value="0" id="change0" type="radio"
                                        <?php if (old('change') == "0"): echo "checked"; endif; ?> name="change">
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
                                            <?php if (old('journey_id') == $journey->id): echo "selected"; endif; ?>>
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
                                            <?php if (old('contract_type_id') == $contract->id): echo "selected"; endif; ?>>
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
                                            <?php if (old('min_hierarchy_id') == $hierarchy->id): echo "selected"; endif; ?>>
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
                                            <?php if (old('max_hierarchy_id') == $hierarchy->id): echo "selected"; endif; ?>>
                                            {{$hierarchy->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-6">
                                    <label for="salary">Pretenção salarial mínima</label>
                                    <input type="text" class="input-money form-control" name="salary"
                                        placeholder="Ex:. 2500">
                                </div>
                                <div class="col-sm-6">
                                    <label for="state_work">Estado onde deseja trabalhar</label>
                                    <select name="state_work[]" class="state-work form-control" multiple="multiple">
                                        @foreach($states as $state)
                                        <option value="{{$state->id}}">
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

    </section>
    <!-- /.content -->
</div>
<!-- /.row (main row) -->

@stop