<div class="modal fade" id="confirmationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Confirmação</h4>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja realizar esta exclusão?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirm">Confirmar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--Senha-->
<div class="modal fade" id="candidatePassword">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Alterar Senha</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('candidate.password')}}">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="password">Senha</label>
                            <input type="password" name="password" placeholder="Senha" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="password_confirmation">Confirmação da Senha</label>
                            <input type="password" name="password_confirmation" placeholder="Confirmação"
                                class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Senha-->
<!--/.Forma de pagamento-->

<div class="modal fade" id="planModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirm" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


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
            <form action="{{route('candidate.formation.store')}}" method="POST">
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
            <form action="{{route('candidate.formation.update')}}" method="POST">
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
            <form method="POST" action="{{route('candidate.professional.store')}}">
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
            <form method="POST" action="{{route('candidate.professional.update')}}">
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
            <form action="{{route('candidate.language.store')}}" method="POST">
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
            <form action="{{route('candidate.language.update')}}" method="POST">
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
            <form action="{{route('candidate.knowledge.store')}}" method="POST">
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
            <form action="{{route('candidate.knowledge.update')}}" method="POST">
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

<div class="modal fade" id="paymentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Dados para pagamento</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12" id="error">

                </div>
                <form id="key-generate" action="{{route('candidate.transaction.hash')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="session_id" value="">
                    <input type="hidden" name="hash" value="">
                    <input type="hidden" name="plan" value="">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="cardNumber">Numero do cartão</label>
                            <input type="text" name="cardNumber" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="brand">Bandeira</label>
                            <select name="brand" class="form-control" required>
                                <option>SELECIONE..</option>
                                <option value="visa">VISA</option>
                                <option value="mastercard">MASTERCARD</option>
                                <option value="elo">ELO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="cvv">CVV</label>
                            <input type="text" name="cvv" class="form-control" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="expirationMonth">Mês Venc.</label>
                            <select name="expirationMonth" class="form-control" required>
                                <option>SELECIONE..</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <?php $year =  date('Y') ?>
                        <div class="col-sm-3">
                            <label for="expirationYear">Ano Venc.</label>
                            <select name="expirationYear" class="form-control" required>
                                <option>SELECIONE..</option>
                                @for($i =0; $i < 15; $i++) <option value="{{$year+1}}">{{$year+$i}}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Incluir</button>
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
@yield('modals')