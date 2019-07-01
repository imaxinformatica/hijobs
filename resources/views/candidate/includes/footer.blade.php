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
                        <li><a href="{{route('company.candidate')}}">Busque Candidatos</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Candidato</b></p>
                    <ul>
                        <li><a href="{{route('candidate.create')}}">Cadastre seu Currículo</a></li>
                        <li><a href="{{route('candidate.opportunity')}}">Busque vagas</a></li>
                        <li><a href="{{route('opportunity.create')}}">Acompanhe suas Candidaturas</a></li>
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
<script type="text/javascript"
    src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script type="text/javascript"
    src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
</script>
<!-- <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt-BR.min.js">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
//Evento de Clique botão assinar plano
$('.act-delete').on('click', function(e) {
    e.preventDefault();
    $('#confirmationModal .modal-title').html('Confirmação');
    $('#confirmationModal .modal-body p').html('Tem certeza que deseja realizar esta ação?');
    var href = $(this).attr('href');
    $('#confirmationModal').modal('show').on('click', '#confirm', function() {
        window.location.href = href;
    });
});
$('.state-work').select2();
$('.subknowledge').select2();

$('.act-plan').on('click', function(e) {
    e.preventDefault();
    var status = $(this).data('plan');
    if (status == 'ACTIVE') {
        var href = $(this).attr('href');
        window.location.href = href;
    } else {
        $('#planModal .modal-title').html('Assine um de nossos planos');
        $('#planModal .modal-body p').html('Para ter acesso a esta tela, assine um de nossos planos');
        $('#planModal').modal('show')
    }
});
$('.act-payment').on('click', function(e) {
    e.preventDefault(); //Impede de confirmar a ação
    var url = $(this).data('url'); //seta a url a acessar 
    var plan = $(this).data('plan');
    $('#paymentModal form input[name="plan"]').val(plan);
    getSessionId(url); //Chama a função via ajax
    $('#paymentModal').modal('show'); //Mostra o Modal
});

$('#checkout').on('submit', function(e) {
    e.preventDefault();
    var token = PagSeguroDirectPayment.getSenderHash();
    $('#checkout input[name="hash_comprador"]').val(token);

    document.getElementById("checkout").submit();
});
//Gera sessão de pagamento
function getSessionId(url) {
    $.ajax({
        type: 'GET',
        url: url,
        beforeSend: function() {},
        success: function(data) {
            PagSeguroDirectPayment.setSessionId(data); //seta a sessão
            $('#paymentModal form input[name="session_id"]').val(data); //seta a sessao no formulario
        }
    });
}
$('#key-generate').submit(function(e) {
    e.preventDefault();
    //Pega os dados para gerar o hash
    var param = {
        cardNumber: $("input[name='cardNumber']").val(),
        brand: $("select[name='brand']").val(),
        cvv: $("input[name='cvv']").val(),
        expirationMonth: $("select[name='expirationMonth']").val(),
        expirationYear: $("select[name='expirationYear']").val(),
        success: function(response) {},
        error: function(response) {},
        complete: function(response) {

            if (response.hasOwnProperty('error')) {
                for (var [key, value] of Object.entries(response.errors)) {
                    $('#error').html(
                        '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" +aria-hidden="true">&times;</button>Ops, tivemos um erro:' +
                        key + ': ' + value + '</div>');
                }
            }
            $('#paymentModal form input[name="hash"]').val(response['card']['token']);
            document.getElementById("key-generate").submit();
        }
    }
    //cria o token hash
    var hash = PagSeguroDirectPayment.createCardToken(param);
});

$('#top-candidate').click(function() {
    $(this).addClass('active');
    $('#top-company').removeClass('active');
});

$('#top-company').click(function() {
    $(this).addClass('active');
    $('#top-candidate').removeClass('active');
});

//Mascaras
$(document).ready(function() {
    $('.input-cep').inputmask({
        "mask": "99999-999",
        "placeholder": "_"
    });
    $('.input-cpf').inputmask({
        "mask": "999.999.999-99",
        "placeholder": "_"
    });
    $('.input-month').inputmask({
        "mask": "99",
        "placeholder": "__"
    });
    $('.input-year').inputmask({
        "mask": "9999",
        "placeholder": "____"
    });
    $('.input-date').inputmask({
        "mask": "99/99/9999",
        "placeholder": "_"
    });
});
$('.input-phone').focusout(function() {
    var phone = $(this).val().replace(/\D/g, '');
    if (phone.length > 10) {
        $(this).inputmask({
            "mask": "(99) 99999-9999",
            "placeholder": " "
        });
    } else {
        $(this).inputmask({
            "mask": "(99) 9999-99999",
            "placeholder": " "
        });
    }
});

$(".input-money").maskMoney({
    thousands: '.',
    decimal: ',',
    allowZero: true,
    symbolStay: true
});

$('.input-date').datepicker({
    language: 'pt-BR',
    format: 'dd/mm/yyyy',
    autoclose: true,
    defaultViewDate: {
        year: '1930',
        month: '0',
        day: '1'
    },
});

$('.text_know').hide();
$('.country_id').change(function() {
    var country_id = $(this).val();
    validateCountryScript(country_id);
});
$('.state_id').change(function() {
    var state_id = $(this).val();
    getCitiesScript(state_id);
});

$('.knowledge_id').change(function() {
    var knowledge_id = $(this).val();
    getSubknowledgeScript(knowledge_id);
});

$('.situation').change(function() {
    var situation = $(this).val();
    getSituation(situation);
});
$('.actually').change(function() {
    var actually = $(this).val();
    isActually(actually);
});
/*
 **Funções
 */
function validateCountryScript(country_id) {
    if (country_id == 1) {
        getStatesScript();
    } else {
        $('.state_formation').slideUp();
        $('.state_professional').slideUp();
        $('.city_professional').slideUp();
        $('.state_id').html('');
    }
}

function getSituation(situation) {
    if (situation == 'trancado') {
        $('.finish').hide();
    } else {
        $('.finish').show();
    }
}

function isActually(actually) {
    if (actually == 0) {
        $('.finish').show();
    } else {
        $('.finish').hide();
    }
}

$('.level_id').change(function() {
    var level_id = $(this).val();
    getCoursesScript(level_id);
});

function getStatesScript() {
    var states = <?php echo getStates() ?>;

    $('.state_formation').slideDown();
    $('.state_professional').slideDown();
    $('.city_professional').slideDown();
    $('.state_id').html('');
    $('.state_id').append('<option selected disabled>SELECIONE...</option>');
    for (var i = 0; i < states.length; ++i) {
        $('.state_id').append('<option value="' + states[i].id + '" >' + states[i].name +
            '</option>');
    }
}

function getCoursesScript(level_id) {
    $.ajax({
        type: 'POST',
        url: "{{route('get-courses')}}",
        data: {
            level_id: level_id,
        },
        beforeSend: function() {},
        success: function(data) {
            var courses = $.parseJSON(data);
            $('.course_id').html('');
            $('.course_id').append('<option selected disabled>SELECIONE...</option>');
            for (var i = 0; i < courses.length; ++i) {
                $('.course_id').append('<option value="' + courses[i].id + '" >' + courses[i].name +
                    '</option>');
            }
        }
    });
}

function getCitiesScript(state_id) {
    $.ajax({
        type: 'POST',
        url: "{{route('get-cities')}}",
        data: {
            state_id: state_id,
        },
        beforeSend: function() {},
        success: function(data) {
            var cities = $.parseJSON(data);
            $('.city_id').html('');
            $('.city_id').append('<option selected disabled>SELECIONE...</option>');
            for (var i = 0; i < cities.length; ++i) {
                $('.city_id').append('<option value="' + cities[i].id + '" >' + cities[i].name +
                    '</option>');
            }
        }
    });
}

function getSubknowledgeScript(knowledge_id) {
    $.ajax({
        type: 'POST',
        url: "{{route('get-subknowledges')}}",
        data: {
            knowledge_id: knowledge_id,
        },
        beforeSend: function() {},
        success: function(data) {
            var subknowledges = $.parseJSON(data);
            $('.subknowledge_id').html('');
            $('.subknowledge_id').append('<option selected disabled>SELECIONE...</option>');
            for (var i = 0; i < subknowledges.length; ++i) {
                $('.subknowledge_id').append('<option value="' + subknowledges[i].id + '" >' +
                    subknowledges[i].name +
                    '</option>');
            }
        }
    });
}
/*
 **Modals
 */

$('.act-formation-edit').on('click', function(e) {
    e.preventDefault();
    var formation_id = $(this).data('formation-id');
    var name = $(this).data('formation-name');
    var country_id = $(this).data('formation-country_id');
    var state_id = $(this).data('formation-state_id');
    var level_id = $(this).data('formation-level_id');
    var course_id = $(this).data('formation-course_id');
    var situation = $(this).data('formation-situation');
    var start_month = $(this).data('formation-start_month');
    var start_year = $(this).data('formation-start_year');
    var finish_month = $(this).data('formation-finish_month');
    var finish_year = $(this).data('formation-finish_year');

    $('#formationEditModal form input[name="formation_id"]').val(formation_id);
    $('#formationEditModal form input[name="name"]').val(name);
    $('#formationEditModal form select[name="country_id"]').val(country_id);
    $('#formationEditModal form select[name="state_id"]').val(state_id);
    $('#formationEditModal form select[name="level_id"]').val(level_id);
    $('#formationEditModal form select[name="course_id"]').val(course_id);
    $('#formationEditModal form select[name="situation"]').val(situation);
    $('#formationEditModal form select[name="start_month"]').val(start_month);
    $('#formationEditModal form select[name="start_year"]').val(start_year);
    $('#formationEditModal form select[name="finish_month"]').val(finish_month);
    $('#formationEditModal form select[name="finish_year"]').val(finish_year);
    getSituation(situation);

    $('#formationEditModal').modal('show');
});

$('.act-professional-edit').on('click', function(e) {
    e.preventDefault();
    var professional_id = $(this).data('professional-id');
    var name = $(this).data('professional-name');
    var occupation = $(this).data('professional-occupation');
    var hierarchy_id = $(this).data('professional-hierarchy_id');
    var description = $(this).data('professional-description');
    var country_id = $(this).data('professional-country_id');
    var state_id = $(this).data('professional-state_id');
    var city_id = $(this).data('professional-city_id');
    var start_month = $(this).data('professional-start_month');
    var start_year = $(this).data('professional-start_year');
    var finish_month = $(this).data('professional-finish_month');
    var finish_year = $(this).data('professional-finish_year');

    $('#professionalEditModal form input[name="professional_id"]').val(professional_id);
    $('#professionalEditModal form input[name="name"]').val(name);
    $('#professionalEditModal form input[name="occupation"]').val(occupation);
    $('#professionalEditModal form select[name="hierarchy_id"]').val(hierarchy_id);
    $('#professionalEditModal form textarea[name="description"]').val(description);
    $('#professionalEditModal form select[name="country_id"]').val(country_id);
    $('#professionalEditModal form select[name="state_id"]').val(state_id);
    $('#professionalEditModal form select[name="city_id"]').val(city_id);
    $('#professionalEditModal form select[name="start_month"]').val(start_month);
    $('#professionalEditModal form select[name="start_year"]').val(start_year);
    $('#professionalEditModal form select[name="finish_month"]').val(finish_month);
    $('#professionalEditModal form select[name="finish_year"]').val(finish_year);
    if (finish_year == null || finish_year == "") {
        actually = 1;
    } else {
        actually = 0;
    }
    $('#professionalEditModal form select[name="actually"]').val(actually);
    isActually(actually);
    $('#professionalEditModal').modal('show');
});

$('.act-language-edit').on('click', function(e) {
    e.preventDefault();
    var lang_id = $(this).data('language-id');
    var level = $(this).data('language-level');
    var language_id = $(this).data('language-language_id');

    $('#languageEditModal form input[name="lang_id"]').val(lang_id);
    $('#languageEditModal form select[name="level"]').val(level);
    $('#languageEditModal form select[name="language_id"]').val(language_id);

    $('#languageEditModal').modal('show');
});

$('.act-knowledge-edit').on('click', function(e) {
    e.preventDefault();
    var know_id = $(this).data('knowledge-id');
    var knowledge_id = $(this).data('knowledge-knowledge_id');
    var subknowledge_id = $(this).data('knowledge-subknowledge_id');

    $('#knowledgeEditModal form input[name="know_id"]').val(know_id);
    $('#knowledgeEditModal form select[name="knowledge_id"]').val(knowledge_id);
    $('#knowledgeEditModal form select[name="subknowledge_id"]').val(subknowledge_id);

    $('#knowledgeEditModal').modal('show');
});
$('.act-formation').on('click', function(e) {
    e.preventDefault();
    var candidate_id = $(this).data('candidate_id');

    $('#formationModal form input[name="candidate_id"]').val(candidate_id);

    $('#formationModal').modal('show');
});

$('.act-professional').on('click', function(e) {
    e.preventDefault();
    var candidate_id = $(this).data('candidate_id');

    $('#professionalModal form input[name="candidate_id"]').val(candidate_id);

    $('#professionalModal').modal('show');
});
$('.act-language').on('click', function(e) {
    e.preventDefault();
    var candidate_id = $(this).data('candidate_id');

    $('#languageModal form input[name="candidate_id"]').val(candidate_id);

    $('#languageModal').modal('show');
});

$('.act-knowledge').on('click', function(e) {
    e.preventDefault();
    var candidate_id = $(this).data('candidate_id');

    $('#knowledgeModal form input[name="candidate_id"]').val(candidate_id);

    $('#knowledgeModal').modal('show');
});
//****Senha****//
$('.act-password').on('click', function(e) {
    e.preventDefault();
    $('#candidatePassword').modal('show');
});

// Consulta por CEP
$(document).ready(function() {



    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#street").val("...");
                $("#nehighbor").val("...");
                $("#city").val("...");
                $("#state").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#street").val(dados.logradouro);
                        $("#nehighbor").val(dados.bairro);
                        $("#city").val(dados.localidade);
                        $("#state").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                alert("Formato de CEP inválido.");
            }
        } //end if.
    });
});
$('.clear-filters').click( function(){
    $(':input','#filterForm')
    .not(':button, :submit, :reset, :hidden')
    .val('')
    .prop('checked', false)
    .prop('selected', false);
  });
</script>
@yield('scripts')