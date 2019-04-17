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
                         @foreach($pages as $page)
                            @if($page->type == 'Empresas')
                            <li><a href="{{route('footer', ['urn' => $page->urn])}}">{{$page->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Candidato</b></p>
                    <ul>
                         @foreach($pages as $page)
                            @if($page->type == 'Candidato')
                            <li><a href="{{route('footer', ['urn' => $page->urn])}}">{{$page->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Suporte</b></p>
                    <ul>
                         @foreach($pages as $page)
                            @if($page->type == 'Suporte')
                            <li><a href="{{route('footer', ['urn' => $page->urn])}}">{{$page->name}}</a></li>
                            @endif
                        @endforeach
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
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

//Select2
$(document).ready(function() {
    $('.state').select2();
    $('.city').select2();
});
</script> 

