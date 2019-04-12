<!--Formação-->
<div class="modal fade" id="candidateFormation">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('candidate.formation')}}">
        {{csrf_field()}}
        @isset($candidate)
        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
        @endisset
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Formação</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-12">
              <label for="name">Nome da Instituição</label>
              <input type="text" name="name" placeholder="Nome da Instituição" class="form-control" id="name">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="country_id">País</label>
              <select name="country_id" class="form-control country_id">
                <option selected disabled>País..</option>
                @isset($countries)
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
                @endisset
              </select>
            </div>
            <div class="col-sm-6 state_id" >
              <label for="state_id">Estado</label>
              <select name="state_id" class="form-control">
                <option selected disabled>Estado..</option>
                @isset($states)
                @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
                @endisset
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="level">Nível</label>
              <select id="level" name="level" class="form-control">
                <option selected disabled>Nível..</option>
                @isset($levels)
                @foreach($levels as $level)
                <option value="{{$level->id}}">{{$level->name}}</option>
                @endforeach
                @endisset
                
              </select>
            </div>
            <div class="col-sm-6">
              <label for="course">Curso..</label>
              <select id="course" name="course" class="form-control">
                <option selected disabled>Curso..</option>
                @isset($courses)
                @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
                @endisset
              </select>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="situation">Situação</label>
              <select id="situation" name="situation" class="form-control">
                <option selected disabled>Situação..</option>
                <option value="concluido">Concluído</option>
                <option value="cursando">Cursando</option>
                <option value="trancado">Trancado</option>
              </select>
            </div>
            <div class="col-sm-3" id="start">
              <label for="start">Início</label>
              <input type="text"  name="start" placeholder="MM/AAAA" class="form-control input-month" id="start">
            </div>
            <div class="col-sm-3" id="finish">
              <label for="finish">Conclusão</label>
              <input type="text"  name="finish" placeholder="MM/AAAA" class="form-control input-month" id="finish">
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
<!--/.Formação-->


<!--Experiencia Profissional-->
<div class="modal fade" id="candidateExperience">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('candidate.experience')}}">
        {{csrf_field()}}
        @isset($candidate)
        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
        @endisset
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Experiência Profissional</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-12">
              <label for="name">Nome da Empresa</label>
              <input type="text" name="name" placeholder="Nome da Empresa" class="form-control" id="name">
            </div>
          </div>
          <div class="form-group" >
            <div class="col-sm-6">
              <label for="occupation">Cargo</label>
              <input type="text" name="occupation" placeholder="Indique seu Cargo.." class="form-control" id="name">
            </div>
            <div class="col-sm-6">
              <label for="hierarchy_id">Nível Hierárquico</label>
              <select id="hierarchy_id" name="hierarchy_id" class="form-control">
                <option selected disabled>Selecione..</option>
                @isset($hierarchies)
                @foreach($hierarchies as $hierarchy)
                <option value="{{$hierarchy->id}}">{{$hierarchy->name}}</option>
                @endforeach
                @endisset
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for="description">Descrição das Atividadees</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="country_id">País</label>
              <select name="country_id" class="form-control country_id">
                <option selected disabled>País..</option>
                @isset($countries)
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
                @endisset
              </select>
            </div>
            <div class="col-sm-6 state_id">
              <label for="state_id">Estado</label>
              <select  name="state_id" class="form-control">
                <option selected disabled>Estado..</option>
                @isset($states)
                @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
                @endisset
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="city_id">Cidade</label>
              <select id="city_id" name="city_id" class="form-control">
                <option selected disabled>Cidade..</option>
                <option value="1">São Paulo</option>
                <option value="2">Guarulhos</option>
                <option value="3">Santos</option>
                <option value="4">ABC</option>
              </select>
            </div>
            <div class="col-sm-2">
              <label for="start">Início</label>
              <input type="text" name="start" placeholder="MM/AAAA" class="form-control input-month" id="start">
            </div>
            <div class="col-sm-2">
              <label for="finish">Conclusão</label>
              <input type="text" name="finish" placeholder="MM/AAAA" class="form-control input-month" id="finish">
            </div>
            <div class="col-sm-2">
              <label class="lbl-caracteristicas actually"><input type="checkbox" name="actually"><span class="checkmark"></span>Atual</label>
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
<!--/.Experiencia Profissional-->
       

<!--Idioma-->
<div class="modal fade" id="candidateLanguage">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('candidate.language')}}">
        {{csrf_field()}}
        @isset($candidate)
        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
        @endisset
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Idioma</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-6">
              <label for="language_id">Idioma</label>
              <select id="language_id" name="language_id" class="form-control">
                <option selected disabled>Selecione..</option>
                @isset($languages)
                @foreach($languages as $language)
                <option value="{{$language->id}}">{{$language->name}}</option>
                @endforeach
                @endisset
              </select>
            </div>
            <div class="col-sm-6">
              <label for="level">Nível</label>
              <select id="level" name="level" class="form-control">
                <option selected disabled>Selecione..</option>
                <option value="Básico">Básico</option>
                <option value="Intermediário">Intermediário</option>
                <option value="Avançado">Avançado</option>
                <option value="Fluente">Fluente</option>
                <option value="Nativo">Nativo</option>
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
<!--/.Idioma-->

<!--Área de Conhecimento-->
<div class="modal fade" id="candidateKnowledge">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('candidate.knowledge')}}">
        {{csrf_field()}}
        @isset($candidate)
        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
        @endisset
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Conhecimentos em Informática</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-6">
              <label for="knowledge_id">Tipo</label>
              <select id="knowledge_id" name="knowledge_id" class="form-control">
                <option selected disabled>Selecione..</option>
                @isset($knowledges)
                @foreach($knowledges as $knowledge)
                <option value="{{$knowledge->id}}">{{$knowledge->name}}</option>
                @endforeach
                @endisset
              </select>
            </div>
            <div class="col-sm-6">
              <label for="subknowledge_id">Habilidades</label>
              <select id="subknowledge_id" name="subknowledge_id[]" class="form-control subknowledge" multiple="multiple">
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
<!--/.Área de Conhecimento-->

          