<!--Formação-->
<div class="modal fade" id="candidateFormation">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('candidate.formation')}}">
        {{csrf_field()}}
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
              <label for="country">País</label>
              <select id="country" name="country" class="form-control">
                <option selected disabled>País..</option>
                <option value="1">Brasil</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label for="state_id">Estado</label>
              <select id="state_id" name="state_id" class="form-control">
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
                <option value="1">Curso extra-curricular/Profissionalizante</option>
                <option value="2">Ensino Médio (2º Grau)</option>
                <option value="3">Curso Técnico</option>
                <option value="4">Ensino Superior</option>
                <option value="5">Pós Graduação - Especialização/MBA</option>
                <option value="6">Pós Graduação - Mestrado</option>
                <option value="7">Pós Graduação - Doutorado</option>
                <option value="8">Ensino Fundamental (1º Grau)</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label for="course">Curso..</label>
              <select id="course" name="course" class="form-control">
                <option selected disabled>Curso..</option>
                <option selected disabled>Nível..</option>
                <option value="1">Informática</option>
                <option value="2">Ensino Médio (2º Grau)</option>
                <option value="3">Curso Técnico</option>
                <option value="4">Ensino Fundamental (1º Grau)</option>
              </select>
            </div>
          </div>
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
            <div class="col-sm-3">
              <label for="start">Início</label>
              <input type="text" name="start" placeholder="MM/AAAA" class="form-control" id="start">
            </div>
            <div class="col-sm-3">
              <label for="finish">Conclusão</label>
              <input type="text" name="finish" placeholder="MM/AAAA" class="form-control" id="finish">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Incluir</button>
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
              <label for="name">Cargo</label>
              <input type="text" name="name" placeholder="Indique seu Cargo.." class="form-control" id="name">
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
              <select id="country_id" name="country_id" class="form-control">
                <option selected disabled>País..</option>
                <option value="1">Brasil</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label for="state_id">Estado</label>
              <select id="state_id" name="state_id" class="form-control">
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
            <div class="col-sm-3">
              <label for="start">Início</label>
              <input type="text" name="start" placeholder="MM/AAAA" class="form-control" id="start">
            </div>
            <div class="col-sm-3">
              <label for="finish">Conclusão</label>
              <input type="text" name="finish" placeholder="MM/AAAA" class="form-control" id="finish">
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Incluir</button>
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
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Idioma</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-6">
              <label for="language">Idioma</label>
              <select id="language" name="language" class="form-control">
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
                <option value="basico">Básico</option>
                <option value="intermediario">Intermediário</option>
                <option value="avancado">Avançado</option>
                <option value="fluente">Fluente</option>
                <option value="nativo">Nativo</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Incluir</button>
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
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Idioma</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-6">
              <label for="type_id">Tipo</label>
              <select id="type_id" name="type" class="form-control">
                <option selected disabled>Selecione..</option>
               
                <option value="0">Programação</option>
                
              </select>
            </div>
            <div class="col-sm-6">
              <label for="knowledge_id">Habilidade</label>
              <select id="knowledge_id" name="knowledge_id" class="form-control">
                <option selected disabled>Selecione..</option>
                <option value="1">PHP</option>
                <option value="2">Java</option>
                <option value="3">Javascript</option>
                <option value="4">Pacote Office</option>
                <option value="5">C#</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Incluir</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--/.Área de Conhecimento-->

          