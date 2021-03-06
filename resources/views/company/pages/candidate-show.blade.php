@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Visualizando currículo</h1>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                    <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Dados Pessoais </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p for="name"><b>Nome: </b>{{$candidate->name}}</p>
                            <p for="name"><b>E-mail: </b>{{$candidate->email}}</p>
                            <p for="name"><b>Telefone: </b>{{$candidate->phone}}</p>
                            <p for="name"><b>Estado Civil: </b>{{$candidate->marital_status}}</p>
                            <p for="name"><b>Data de Nascimento: </b>{{$candidate->birthdate}}</p>
                            <p for="name"><b>Endereço: </b>{{$candidate->street}}, @if($candidate->number)
                                {{$candidate->number}}, @endif {{$candidate->nehighbor}}, {{$candidate->city}} -
                                {{$candidate->state}}</p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <p><b>Pessoa com deficiência física?</b> @if($candidate->special == 1) Sim
                                @foreach($candidate->special()->get() as $special)
                                <p>
                                    {{$special->name}}
                                </p>
                                @endforeach
                                {{$candidate->special_description}}
                                @else Não @endif
                            </p>
                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-xs-12">
                            <h4>Formação</h4>
                            <table class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Nível</th>
                                        <th scope="col">Curso</th>
                                        <th scope="col">Situação</th>
                                        <th scope="col">Conclusão</th>
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
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">Não possui nenhuma formação cadastrada</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-xs-12">
                            <h4>Experiência Profissional</h4>
                            <table class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th scope="col">Nome Empresa</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Nível hierárquico</th>
                                        <th scope="col">Data início</th>
                                        <th scope="col">Descrição</th>
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
                                            <a href="#" class="more-details" data-name_empresa="{{$professional->name}}"
                                                data-description="{{$professional->description}}">Mais Detalhes</a>

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">Não possui nenhuma experiência cadastrada</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-xs-12">
                            <h4>Idiomas</h4>
                            <table class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th scope="col">Idioma</th>
                                        <th scope="col">Nível</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($candidate->language_candidates as $lang)
                                    <tr>
                                        <td>{{$lang->language->name}}</td>
                                        <td>{{$lang->level}}</td>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2">Não possui nenhum idioma cadastrado</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-xs-12">
                            <h4>Conhecimentos em Informática</h4>
                            <table class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Conhecimento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($candidate->knowledges as $know)
                                    <tr>
                                        <td>{{$know->knowledge->name}}</td>
                                        <td>{{$know->subknowledge->name}}</td>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">Não possui nenhum conhecimento em informática cadastrado</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Objetivos profissionais</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @isset($candidate->journey)
                            <p for="name"><b>Jornada: </b>{{$candidate->journey->name}}</p>
                            @endisset
                            @isset($candidate->contract_type)
                            <p for="name"><b>Tipo de contrato: </b>{{$candidate->contract_type->name}}</p>
                            @endisset
                            @isset($candidate->min_hierarchy)
                            <p for="name"><b>Nível hierárquico mínimo: </b>{{$candidate->min_hierarchy->name}}</p>
                            @endisset
                            @isset($candidate->max_hierarchy)
                            <p for="name"><b>Nível hierárquico máximo: </b>{{$candidate->max_hierarchy->name}}</p>
                            @endisset
                            <p for="name"><b>Pretenção salarial mínima: </b>R$
                                {{number_format($candidate->salary, 2, ',', '.')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Redes sociais</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @if($candidate->linkedin != '')
                            <p for="name"><b>Linkedin: </b>{{$candidate->linkedin}}</p>
                            @endif
                            @if($candidate->facebook != '')
                            <p for="name"><b>Facebook: </b>{{$candidate->facebook}}</p>
                            @endif
                            @if($candidate->twitter != '')
                            <p for="name"><b>Twitter: </b>{{$candidate->twitter}}</p>
                            @endif
                            @if($candidate->blog != '')
                            <p for="name"><b>Blog: </b>{{$candidate->blog}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Informações complementares</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p><b>Tipo de habilitação para dirigir: </b>@if($candidate->driver()->count()!= 0)
                                @foreach($candidate->driver as $driver)
                                {{$driver->name}}
                                @endforeach
                                @else colspan="6" Não Possui Habilitação @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p><b>Possui veículo próprio?</b>@if($candidate->vehicle()->count()!= 0)
                                Sim
                                <p><b>Qual? </b></p>
                                @foreach($candidate->vehicle as $vehicle)
                                <p>
                                    {{$vehicle->name}}
                                </p>
                                @endforeach
                                @else colspan="6" Não Possui Veículo @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p><b>Tem disponibilidade para viajar? </b> @if($candidate->travel ==1)
                                Sim
                                @else
                                Não
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p><b>Tem disponibilidade para mudar de residência? </b> @if($candidate->change ==1)
                                Sim
                                @else
                                Não
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="#" class="act-message">
                                <button class="btn-orange">Enviar Mensagem</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
<script type="text/javascript">
$('.more-details').on('click', function(e) {
    e.preventDefault();
    let name_empresa = $(this).data('name_empresa');
    let description = $(this).data('description');
    $('#moreDetailsModal .modal-title').html('Mais detalhes sobre ' + name_empresa);
    $('#moreDetailsModal .content').html(description);
    $('#moreDetailsModal').modal('show');
});
</script>
@endsection

@section('modals')
<div class="modal fade" id="moreDetailsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p class="content"></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="companyMessage">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Mensagem para {{$candidate->name}}</h4>
            </div>
            <form method="POST" action="{{route('company.message')}}">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="message">Mensagem</label>
                            <textarea name="message" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default pull-left"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection