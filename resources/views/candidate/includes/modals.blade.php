<!--Formação-->
<div class="modal fade" id="candidateFormation">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('candidate.formation')}}">
        {{csrf_field()}}
        <div class="modal-header">
          <input type="hidden" name="id_batch">
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
                <option value="caixa">Brasil</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label for="state">Estado</label>
              <select id="state" name="state" class="form-control">
                <option selected disabled>Estado..</option>
                @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="level">Nível</label>
              <select id="level" name="level" class="form-control">
                <option selected disabled>Nível..</option>
                <option value="0">Ensino Fundamental (1º Grau)</option>
                <option value="1">Curso extra-curricular/Profissionalizante</option>
                <option value="2">Ensino Médio (2º Grau)</option>
                <option value="3">Curso Técnico</option>
                <option value="4">Ensino Superior</option>
                <option value="5">Pós Graduação - Especialização/MBA</option>
                <option value="6">Pós Graduação - Mestrado</option>
                <option value="7">Pós Graduação - Doutorado</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label for="course">Curso..</label>
              <select id="course" name="course" class="form-control">
                <option selected disabled>Curso..</option>
                <option selected disabled>Nível..</option>
                <option value="0">Ensino Fundamental (1º Grau)</option>
                <option value="1">Informática</option>
                <option value="2">Ensino Médio (2º Grau)</option>
                <option value="3">Curso Técnico</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="situation">Situação</label>
              <select id="situation" name="situation" class="form-control">
                <option selected disabled>Situação..</option>
                <option value="0">Concluído</option>
                <option value="1">Cursando</option>
                <option value="2">Trancado</option>
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
          <input type="hidden" name="id_batch">
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
              <label for="country">Nível Hierárquico</label>
              <select id="country" name="country" class="form-control">
                <option selected disabled>Selecione..</option>
                <option value="caixa">Estagiário</option>
                <option value="caixa">Operacional</option>
                <option value="caixa">Auxiliar</option>
                <option value="caixa">Assistente</option>
                <option value="caixa">Trainee</option>
                <option value="caixa">Encarregado</option>
                <option value="caixa">Supervisor</option>
                <option value="caixa">Consultor</option>
                <option value="caixa">Especialista</option>
                <option value="caixa">Coordenador</option>
                <option value="caixa">Gerente</option>
                <option value="caixa">Diretor</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for="description">Descrição Atividadees</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="country">País</label>
              <select id="country" name="country" class="form-control">
                <option selected disabled>País..</option>
                <option value="caixa">Brasil</option>
              </select>
            </div>
            <div class="col-sm-6">
              <label for="state">Estado</label>
              <select id="state" name="state" class="form-control">
                <option selected disabled>Estado..</option>
                @foreach($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="state">Cidade</label>
              <select id="state" name="state" class="form-control">
                <option selected disabled>Cidade..</option>
                <option value="0">São Paulo</option>
                <option value="0">Guarulhos</option>
                <option value="0">Santos</option>
                <option value="0">ABC</option>
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
          <input type="hidden" name="id_batch">
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
                @foreach($languages as $language)
                <option value="$language->id">{{$language->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-6">
              <label for="level">Nível</label>
              <select id="level" name="level" class="form-control">
                <option selected disabled>Selecione..</option>
                <option value="caixa">Básico</option>
                <option value="caixa">Intermediário</option>
                <option value="caixa">Avançado</option>
                <option value="caixa">Fluente</option>
                <option value="caixa">Nativo</option>
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
          <input type="hidden" name="id_batch">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Idioma</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-6">
              <label for="language">Tipo</label>
              <select id="language" name="language" class="form-control">
                <option selected disabled>Selecione..</option>
               
                <option value="0">Programação</option>
                
              </select>
            </div>
            <div class="col-sm-6">
              <label for="level">Habilidade</label>
              <select id="level" name="level" class="form-control">
                <option selected disabled>Selecione..</option>
                <option value="caixa">PHP</option>
                <option value="caixa">Java</option>
                <option value="caixa">Javascript</option>
                <option value="caixa">Pacote Office</option>
                <option value="caixa">C#</option>
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

          