<?php
    $pages = DB::table('pages')->get();
?>
<footer>
     <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Institucional</b></p>
                    <ul>
                        @foreach($pages as $page)
                            @if($page->type == 'Institucional')
                            <li><a href="{{route('footer', ['urn' => $page->urn])}}">{{$page->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Empresas</b></p>
                    <ul>
                        <li><a href="{{route('company.create')}}">Cadastre sua Empresa</a></li>
                        <li><a href="{{route('opportunity.create')}}">Anuncie vagas</a></li>
                        <li><a href="{{route('opportunity.create')}}">Busque Candidatos</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Candidato</b></p>
                    <ul>
                        <li><a href="{{route('candidate.create')}}">Cadastre seu Currículo</a></li>
                        <li><a href="{{route('candidate.opportunity')}}">Busque vagas</a></li>
                        <li><a href="{{route('company.candidate')}}">Acompanhe suas Candidaturas</a></li>
                    </ul>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Suporte</b></p>
                    <ul>
                        <li><a href="{{route('frequentlys')}}">Perguntas Frequentes</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="creditos">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="{{asset('images/logo.png')}}"><br>
                    <span>&copy; 2019 Hi Jobs. Todos os direitos reservados.</span>
                </div>
            </div>
        </div>
    </div>
</footer> 
<!-- Scripts -->
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
</script>
<!-- <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">

     //Evento de Clique botão assinar plano
    $('.act-plan').on('click', function (e) {
    e.preventDefault();
    var status = $(this).data('plan');
    if (status == 'ACTIVE') {
        var href = $(this).attr('href');
        window.location.href=href;
    }else{
        $('#planModal .modal-title').html('Assine um de nossos planos');
        $('#planModal .modal-body p').html('Para ter acesso a esta tela, assine um de nossos planos');
        $('#planModal').modal('show')
    }
});
    $('.act-payment').on('click', function (e) {
        e.preventDefault(); //Impede de confirmar a ação
        var url = $(this).data('url'); //seta a url a acessar 
        var plan = $(this).data('plan');
        $('#paymentModal form input[name="plan"]').val(plan);   
        getSessionId(url); //Chama a função via ajax
        $('#paymentModal').modal('show');//Mostra o Modal
    });

    $('#checkout').on('submit', function(e){
        e.preventDefault();
        var token = PagSeguroDirectPayment.getSenderHash();
        $('#checkout input[name="hash_comprador"]').val(token);

        document.getElementById("checkout").submit();
    });
//Gera sessão de pagamento
    function getSessionId(url){
        $.ajax({
            type: 'GET',
            url: url,
            beforeSend: function(){
            },
            success: function(data){
                PagSeguroDirectPayment.setSessionId(data);//seta a sessão
                $('#paymentModal form input[name="session_id"]').val(data);//seta a sessao no formulario
            }
        });
    }
    $('#key-generate').submit(function(e){
        e.preventDefault();
        //Pega os dados para gerar o hash
        var param = {
            cardNumber: $("input[name='cardNumber']").val(),
            brand: $("select[name='brand']").val(),
            cvv: $("input[name='cvv']").val(),
            expirationMonth: $("select[name='expirationMonth']").val(),
            expirationYear: $("select[name='expirationYear']").val(),
            success: function(response) {
            },
            error: function(response) {
            },
            complete: function(response) {
                console.log(response);
                $('#paymentModal form input[name="hash"]').val(response['card']['token']);    
                document.getElementById("key-generate").submit();
            }
        }
        //cria o token hash
        var hash = PagSeguroDirectPayment.createCardToken(param);
    });


    $('#top-candidate').click( function(){
        $(this).addClass('active');
        $('#top-company').removeClass('active');
    });

    $('#top-company').click( function(){
        $(this).addClass('active');
        $('#top-candidate').removeClass('active');
    }); 
//Mascaras
    $( document ).ready(function() {
        $('.input-cep').inputmask({"mask": "99999-999", "placeholder":"_"});
        $('.input-cpf').inputmask({"mask": "999.999.999-99", "placeholder":"_"});
        $('.input-cnpj').inputmask({"mask": "99.999.999/9999-99", "placeholder":"_"});
    });

    $('.input-phone').focusout( function(){
        var phone = $(this).val().replace(/\D/g, '');
        if(phone.length > 10){
            $(this).inputmask({"mask": "(99) 99999-9999", "placeholder":" "});
        } else {
            $(this).inputmask({"mask": "(99) 9999-99999", "placeholder":" "});
        }
    });

    $(".input-money").maskMoney({
        thousands:'.', 
        decimal:',', 
        allowZero: true,
        symbolStay: true
    });

    $('.input-date').datepicker({
      language: 'pt-BR',
      format: 'dd/mm/yyyy',
      autoclose: true
    });

    $('.input-month').datepicker({
      language: 'pt-BR',
      format: 'mm/yyyy',
      autoclose: true
    });

//Modals
  $('.act-delete').on('click', function (e) {
    e.preventDefault();
    $('#confirmationModal .modal-title').html('Confirmação');
    $('#confirmationModal .modal-body p').html('Tem certeza que deseja realizar esta ação?');
    var href = $(this).attr('href');
    $('#confirmationModal').modal('show').on('click', '#confirm', function() {
      window.location.href=href;
    });
  });
    //Formação
$('.act-formation').on('click', function (e) {
    e.preventDefault();
    $('#candidateFormation').modal('show');
});
    //Experiencia
$('.act-experience').on('click', function (e) {
    e.preventDefault();
    $('#candidateExperience').modal('show');
});
    //Idioma
$('.act-language').on('click', function (e) {
    e.preventDefault();
    $('#candidateLanguage').modal('show');
});
    //Conhecimento de Informatica
$('.act-knowledge').on('click', function (e) {
    e.preventDefault();
    $('#candidateKnowledge').modal('show');
});

$('.act-password').on('click', function (e) {
    e.preventDefault();
    $('#companyPassword').modal('show');
});

$('.act-message').on('click', function(e){
    e.preventDefault();
    $('#companyMessage').modal('show');
});
$(document).ready(function(){
    if($('.isCombining').is(":checked")){
        $('.salary').attr('disabled', '');
        $('.salary').attr('value', '');
    }
    $("#situation").change(function(){
        var situation = $(this).val();
        if (situation == 'trancado') {
            $('#finish').hide();
        }else{
            $('#finish').show();
        }
    });
    $('#country_id').change(function(){
        var country = $(this).val();
        if (country != '1') {
            $('#state_id').hide();
        }else{
            $('#state_id').show();
        }
    });

    $('.isCombining').change(function() {
        if($(this).is(":checked")) {
            $('.salary').attr('disabled', '');
            $('.salary').attr('value', '');
        } else{
            $('.salary').removeAttr('disabled');
        }   
    });
});

$(document).ready(function(){
    $('#state' ).change(function() {
        var url = "{{route('opportunity.cities')}}";
        var state_id = $('#state option:selected').val();
        citiesAjax(url, state_id);
    });
    function citiesAjax(url, state_id){
        $.ajax({
            type: 'GET',
            url: url,
            data:{
                state_id: state_id,
            },
            beforeSend: function(){
            },
            success: function(data){
                var result = $.parseJSON(data);
                console.log(result);

                console.log(result[1].name);
                $('#city').html('');
                for (var i = 0; i < result.length; ++i){
                    $('#city').append('<option value="'+result[i].id+'" >'+result[i].name+'</option>');
                }
            }
        });
    }
});

$(document).ready( function(){

    if($('.isSpecial').is(":checked")){
        $('#special').show();
    }else{
        $('#special').hide();
    }    
    $('.isSpecial').change(function() {
        if($(this).is(":checked")) {
            $('#special').slideDown();
        } else{
            $('#special').slideUp();
        }   
    });
});

</script> 

