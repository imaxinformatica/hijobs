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
          <form id="key-generate" action="{{route('company.transaction.hash')}}" method="POST">
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
                  <option value="12">12</option>
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
                <a href="{{route('company.subscriptions')}}">
                    <button type="button" class="btn btn-primary" id="confirm" >Confirmar</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@yield('modals')