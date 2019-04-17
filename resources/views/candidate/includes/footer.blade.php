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

$(document).ready(function(){
    $("#situation").change(function(){
    var situation = $(this).val();
    if (situation == 'trancado') {
        $('#finish').hide();
    }else{
        $('#finish').show();
    }
    });
    $('.country_id').change(function(){
        var country = $(this).val();
        if (country != '1') {
            $('.state_id').hide();
            $('.city_id').hide();
        }else{
            $('.state_id').show();
            $('.city_id').show();
        }
    });
});

$(document).ready( function(){
    $('#special').hide();
    $('.isSpecial').change(function() {
        if($(this).is(":checked")) {
            $('#special').slideDown();
        } else{
            $('#special').slideUp();
        }   
    });
});

$(document).ready(function() {
    $('#knowledge_id').change(function(){
        var knowledge_id = $(this).val();
    });
    $('.state-work').select2();
    $('.subknowledge').select2();
});

$(document).ready(function(){
    $('#actually' ).change(function() {
        var actually = $('#actually:checked').val();
        if (actually == 'on') {
            $('#finished').hide();
        }else{
            $('#finished').show();
        }
    });
});

$(document).ready(function(){
    $('#level' ).change(function() {
        var url = "{{route('candidate.course')}}";
        var level_id = $('#level option:selected').val();
        courseAjax(url, level_id);
    });
    function courseAjax(url, level_id){
        $.ajax({
            type: 'GET',
            url: url,
            data:{
                level_id: level_id,
            },
            beforeSend: function(){
            },
            success: function(data){
                var result = $.parseJSON(data);
                console.log(result[1].name);
                $('#course').html('');
                for (var i = 0; i < result.length; ++i){
                    $('#course').append('<option value="'+result[i].id+'" >'+result[i].name+'</option>');
                }
            }
        });
    }
});

$(document).ready(function(){
    $('#knowledge_id' ).change(function() {
        var url = "{{route('candidate.subknowledge')}}";
        var knowledge_id = $('#knowledge_id option:selected').val();
        knowledgeAjax(url, knowledge_id);
    });
    function knowledgeAjax(url, knowledge_id){
        $.ajax({
            type: 'GET',
            url: url,
            data:{
                knowledge_id: knowledge_id,
            },
            beforeSend: function(){
            },
            success: function(data){
                var result = $.parseJSON(data);
                $('#subknowledge_id').html('');
                for (var i = 0; i < result.length; ++i){
                    $('#subknowledge_id').append('<option value="'+result[i].id+'" >'+result[i].name+'</option>');
                }
            }
        });
    }
});
</script> 

