<!--Formação-->
<div class="modal fade" tabindex="-1" role="dialog" id="candidateFormation">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Formação</h4>
      </div>
      <form action="{{route('candidate.formation')}}" method="POST">
        <div class="modal-body">
          {{csrf_field()}}
          @isset($candidate)
            <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
          @endisset
          <div class="form-group row">
            <div class="col-sm-12">
              <label for="name">Nome da Instituição</label>
              <input type="text" name="name" placeholder="Nome da Instituição" class="form-control" id="name">
            </div>
          </div>
          <div class="form-group row">
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
          <div class="form-group row">
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
              </select>
            </div>
          </div>   
          <div class="form-group row">
            <div class="col-sm-12">
              <label for="situation">Situação</label>
              <select id="situation" name="situation" class="form-control">
                <option selected disabled>Situação..</option>
                <option value="concluido">Concluído</option>
                <option value="cursando">Cursando</option>
                <option value="trancado">Trancado</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">
              <label for="startMonth">Mês Início</label>
              <input type="text"  name="startMonth" placeholder="MM" class="form-control input-month">
            </div>
            <div class="col-sm-3">
              <label for="startYear">Ano Início</label>
              <input type="text"  name="startYear" placeholder="YYYY" class="form-control input-year" >
            </div>
            <div class="col-sm-3 finishMonth">
              <label for="finishMonth">Mês Conclusão</label>
              <input type="text"  name="finishMonth" placeholder="MM" class="form-control input-month" >
            </div>
            <div class="col-sm-3 finishYear">
              <label for="finishYear">Ano Conclusão</label>
              <input type="text"  name="finishYear" placeholder="YYYY" class="form-control input-year">
            </div>
          </div>
      </div>
      <div class="modal-footer">
          <div class="row">
            <div class="col-sm-12">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>
        </div>
        </form>
    </div>
  </div>
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
            <div class="form-group row" >
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
<!--Experiencia Profissional-->
<div class="modal fade" id="candidateExperience">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Experiência Profissional</h4>
        </div>
        <form method="POST" action="{{route('candidate.experience')}}">
          <div class="modal-body">
              {{csrf_field()}}
              @isset($candidate)
              <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
              @endisset
            <div class="form-group row" >
              <div class="col-sm-12">
                <label for="name">Nome da Empresa</label>
                <input type="text" name="name" placeholder="Nome da Empresa" class="form-control" id="name">
              </div>
            </div>
            <div class="form-group row" >
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
            <div class="form-group row">
              <div class="col-sm-12">
                <label for="description">Descrição das Atividadees</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
              </div>
            </div>
            <div class="form-group row">
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
                <select  name="state_id" class="form-control" id="state">
                  <option selected disabled>Estado..</option>
                  @isset($states)
                  @foreach($states as $state)
                  <option value="{{$state->id}}">{{$state->name}}</option>
                  @endforeach
                  @endisset
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 city_id">
                <label for="city_id">Cidade</label>
                <select name="city_id" id="city" class="form-control">
                  <option selected disabled>Cidade..</option>
                </select>
              </div>
              <div class="col-sm-2" id="started">
                <label for="start">Entrada</label>
                <input type="text" name="start" placeholder="MM/AAAA" class="form-control input-month" id="start">
              </div>
              <div class="col-sm-2" id="finished">
                <label for="finish">Saída</label>
                <input type="text" name="finish" placeholder="MM/AAAA" class="form-control input-month" id="finish">
              </div>
              <div class="col-sm-2">
                <label class="lbl-caracteristicas actually"><input type="checkbox" id="actually" name="actually"><span class="checkmark"></span>Atual</label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-12">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
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
<!--/.Experiencia Profissional-->
       

<!--Idioma-->
<div class="modal fade" id="candidateLanguage">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Idioma</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('candidate.language')}}">
            {{csrf_field()}}
            @isset($candidate)
            <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
            @endisset
            <div class="form-group row" >
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
<!--/.Idioma-->

<!--Área de Conhecimento-->
<div class="modal fade" id="candidateKnowledge">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Conhecimentos em Informática</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('candidate.knowledge')}}">
            {{csrf_field()}}
            @isset($candidate)
            <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
            @endisset
            <div class="form-group row" >
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
                  
                </select>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-12">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
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
<!--/.Área de Conhecimento-->


<!--Área de Conhecimento-->
<div class="modal fade" id="paymentModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Incluir Conhecimentos em Informática</h4>
        </div>
        <div class="modal-body">
          <form id="key-generate" action="{{route('candidate.transaction.hash')}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="session_id" value="">
            <input type="hidden" name="hash" value="">
            <input type="hidden" name="plan" value="">
            <div class="form-group row" >
              <div class="col-sm-6">
                <label for="cardNumber">Numero do cartão</label>
                <input type="text" name="cardNumber" class="form-control">
              </div>
              <div class="col-sm-6">
                <label for="brand">Bandeira</label>
                <select name="brand" class="form-control">
                  <option>SELECIONE..</option>
                  <option value="visa">VISA</option>
                  <option value="mastercard">MASTERCARD</option>
                  <option value="elo">ELO</option>
                </select>
              </div>
            </div>
            <div class="form-group row" >
              <div class="col-sm-6">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" class="form-control">
              </div>
              <div class="col-sm-3">
                <label for="expirationMonth">Mês Venc.</label>
                <select name="expirationMonth" class="form-control">
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
                  <option value="11">012</option>
                </select>
              </div>
              <?php $year =  date('Y') ?> 
              <div class="col-sm-3">
                <label for="expirationYear">Ano Venc.</label>
                <select name="expirationYear" class="form-control">
                  <option>SELECIONE..</option>
                  @for($i =0; $i < 15; $i++)
                  <option value="{{$year+1}}">{{$year+$i}}</option>
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
<!--/.Área de Conhecimento-->



          