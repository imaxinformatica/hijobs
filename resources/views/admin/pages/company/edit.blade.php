@extends('admin.templates.default')

@section('title', 'Editar Empresa')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Editar Empresa</h1>
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
                    <form method="POST" action="{{route('admin.company.update')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$company->id}}">
                        <div class="box-body">
                            <div class="form-group row box-razao-social">
                                <div class="col-xs-12">
                                    <label for="trade">Razão Social</label>
                                    <input type="text" name="trade" class="form-control" id="trade"
                                        value="{{$company->trade}}">
                                </div>
                            </div>
                            <div class="form-group row box-nome">
                                <div class="col-xs-12">
                                    <label for="name">Nome Fantasia</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{$company->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 box-cnpj">
                                    <label for="cnpj">CNPJ</label>
                                    <input type="text" name="cnpj" class="form-control input-cnpj" id="cnpj"
                                        value="{{$company->cnpj}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone">Telefone</label>
                                    <input type="text" name="phone" class="form-control input-telefone" id="phone"
                                        value="{{$company->phone}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{$company->email}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="special_company" class="form-check-label">
                                        <input type="checkbox" name="special_company" id="special_company"
                                            class="form-check-input" value="1" {{$company->special_company == 1 ? "checked": ""}}>
                                        Empresa Especial
                                    </label>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="description" style="margin-top: 20px;">Breve Descrição</label>
                                    <textarea name="description" class="form-control" rows="5"
                                        placeholder="Descrição sobre a empresa">{{$company->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="occupation_area_id">Área de Atuação</label>
                                    <select name="occupation_area_id" class="form-control">
                                        <option selected disabled>Selecione</option>
                                        @foreach($occupations as $occupation)
                                        <option value="{{$occupation->id}}"
                                            <?php if ($company->occupation_area_id == $occupation->id): echo "selected"; ?>
                                            <?php endif ?>>{{$occupation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="cep">CEP</label>
                                    <input type="text" name="cep" class="form-control input-cep" id="cep"
                                        value="{{$company->cep}}" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="street">Logradouro / Rua</label>
                                    <input type="text" class="form-control" name="street" value="{{$company->street}}"
                                        placeholder="Logradouro">
                                </div>
                                <div class="col-sm-2">
                                    <label for="number">Número</label>
                                    <input type="text" class="form-control" name="number" value="{{$company->number}}"
                                        placeholder="Número / Complemento">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="neighborhood">Bairro</label>
                                    <input type="text" class="form-control" name="neighborhood"
                                        value="{{$company->neighborhood}}" placeholder="Bairro">
                                </div>
                                <div class="col-sm-4">
                                    <label for="state">Estado</label>
                                    <select name="state" id="state" class="form-control">
                                        <option value=""> Selecione</option>
                                        @foreach($states as $state)
                                        <option value="{{$state->sigla}}"
                                            {{$state->sigla == $company->state ? "selected" : ""}}>{{$state->sigla}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="city">Cidade</label>
                                    <input type="text" class="form-control" name="city" value="{{$company->city}}"
                                        placeholder="Cidade">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h4><b>Redes sociais</b></h4>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control"
                                        value="{{$company->linkedin}}" placeholder="Informe a url do seu perfil">
                                </div>
                                <div class="col-sm-6">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control"
                                        value="{{$company->facebook}}" placeholder="Informe a url do seu perfil">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" class="form-control" value="{{$company->twitter}}"
                                        placeholder="Informe a url do seu perfil">
                                </div>
                                <div class="col-sm-6">
                                    <label for="blog">Blog</label>
                                    <input type="text" name="blog" class="form-control" value="{{$company->blog}}"
                                        placeholder="Informe a url do seu perfil">
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="{{route('admin.company')}}">
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
                        <p>Número de vagas</p>
                        <h3>{{$company->opportunities()->count()}}</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Vagas</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Vagas</th>
                                    <th>Nº Vagas</th>
                                    <th>Salário</th>
                                </tr>
                                @forelse($company->opportunities as $opportunity)
                                <tr>
                                    <td>{{$opportunity->name}}</td>
                                    <td>{{$opportunity->num}}</td>
                                    @if($opportunity->salary == 0)
                                    <td>A combinar</td>
                                    @else
                                    <td>R$ {{number_format($opportunity->salary, 2, ',', '.' )}}</td>
                                    @endif
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