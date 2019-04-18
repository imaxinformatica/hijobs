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

<!--Senha-->
<div class="modal fade" id="companyPassword">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('company.password')}}">
        {{csrf_field()}}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Alterar Senha</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-6">
              <label for="password">Senha</label>
              <input type="password" name="password" placeholder="Senha" class="form-control">
          </div>
          <div class="col-sm-6">
              <label for="password_confirmation">Confirmação da Senha</label>
              <input type="password" name="password_confirmation" placeholder="Confirmação" class="form-control">
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

<!--Senha-->
@isset($candidate)
<div class="modal fade" id="companyMessage">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('company.message')}}">
        {{csrf_field()}}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
          <h4 class="modal-title">Mensagem para {{$candidate->name}}</h4>
        </div>
        <div class="box-body">
          <div class="form-group" >
            <div class="col-sm-12">
              <label for="message">Mensagem</label>
              <textarea name="message" rows="5" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-12">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Voltar</button>
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
@endisset
<!--/.Senha-->

          