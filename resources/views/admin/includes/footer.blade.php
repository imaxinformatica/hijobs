<?php
    $pages = DB::table('pages')->get();
    
?>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <b>HIJobs</b>.</strong> Todos os direitos reservados.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt-BR.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>

<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.js?ver=1.1')}}"></script>

<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script type="text/javascript">
$('#type-transaction').on('change', function() {
    var type = $(this).val();
    if (type != 1) {
        $('#due_date').hide();
    } else {
        $('#due_date').show();
    }
});

$('.act-delete').on('click', function(e) {
    e.preventDefault();
    $('#confirmationModal .modal-title').html('Confirmação');
    $('#confirmationModal .modal-body p').html('Tem certeza que deseja realizar esta ação?');
    var href = $(this).attr('href');
    $('#confirmationModal').modal('show').on('click', '#confirm', function() {
        window.location.href = href;
    });
});

//////////////////////////////////////////////////////////////////////////////////

// Identifica se algum caracter foi digitado e executa a função
$('#dataOrder input').keyup(function() {

    var total = 0;
    var subtotal = realToFloat($('#dataOrder input[name="subtotal"]').val());
    var freight = realToFloat($('#dataOrder input[name="freight"]').val());
    var discount = realToFloat($('#dataOrder input[name="discount"]').val());

    total = subtotal + freight - discount;

    // Fixa apenas duas casas decimais para o número
    total = total.toFixed(2);

    // Converte para o formato brasileiro
    total = floatToReal(total);

    // Passa o valor para o formulário
    $('#dataOrder input[name="total"]').val(total);

});

$('.state-work').select2();

$('.simple-text-editor').wysihtml5({
    toolbar: {
      "font-styles": false, // Font styling, e.g. h1, h2, etc.
      "emphasis": false, // Italics, bold, etc.
      "lists": false, // (Un)ordered lists, e.g. Bullets, Numbers.
      "html": false, // Button which allows you to edit the generated HTML.
      "link": false, // Button to insert a link.
      "image": false, // Button to insert an image.
      "color": false, // Button to change color of font
      "blockquote": false
    }
  });

  $('.medium-text-editor').wysihtml5({
    toolbar: {
      "font-styles": false, // Font styling, e.g. h1, h2, etc.
      "emphasis": true, // Italics, bold, etc.
      "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
      "html": false, // Button which allows you to edit the generated HTML.
      "link": true, // Button to insert a link.
      "image": false, // Button to insert an image.
      "color": true, // Button to change color of font
      "blockquote": false
    }
  });


// Converte número do formato brasileiro para tipo float
function realToFloat(amount) {
    amount = amount.replace(/\./g, "");
    amount = amount.replace(",", ".");
    amount = parseFloat(amount);
    return amount;
}
// Converte número do formato float para o formato brasileiro
function floatToReal(n, c, d, t) {
    c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" :
        "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n -
        i).toFixed(c).slice(2) : "");
}
$('.clear-filters').click(function() {
    $(':input', '#filterForm')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .prop('checked', false)
        .prop('selected', false);
});

// Mask
$(document).ready(function() {
    $('.input-telefone').each(function() {
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

    $('.input-cep').inputmask({
        "mask": "99999-999",
        "placeholder": "_"
    });

    $('.input-cnpj').inputmask({
        "mask": "99.999.999/9999-99",
        "placeholder": "_"
    });
    $('.input-cpf').inputmask({
        "mask": "999.999.999-99",
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

$('.level_id').change(function() {
    var level_id = $(this).val();
    getCoursesScript(level_id);
});

$('.situation').change(function() {
    var situation = $(this).val();
    getSituation(situation);
});
$('.actually').change(function() {
    var actually = $(this).val();
    isActually(actually);
});

$(document).ready(function(){
    isSpecial();
});
function isSpecial(){
    $('#special').hide();
    if ($('.isSpecial').is(":checked")) {
        $('#special').slideDown();
    } else {
        $('#special').slideUp();
    }
}

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

function isActually(actually) {
    if (actually == 0) {
        $('.finish').show();
    } else {
        $('.finish').hide();
    }
}
function getSituation(situation) {
    if (situation == 'trancado') {
        $('.finish').hide();
    } else {
        $('.finish').show();
    }
}

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

$('.isSpecial').change(function() {
    isSpecial();
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
$('.alert .close').click(function() {
    $(this).parent().hide();
});

$('.input-date').datepicker({
    language: 'pt-BR',
    format: 'dd/mm/yyyy',
    autoclose: true
});
$('.input-date').inputmask({
    "mask": "99/99/9999",
    "placeholder": "_"
});


$(".input-money").maskMoney({
    thousands: '.',
    decimal: ',',
    allowZero: true,
    symbolStay: true
});
$('#no_due_batch').change(function() {
    if ($(this).is(':checked')) {
        $('input[name="due_date"]').attr('disabled', '');
    } else {
        $('input[name="due_date"]').removeAttr('disabled', '');
    }
});

$('#no_due').change(function() {
    if ($(this).is(':checked')) {
        $('input[name="due_date"]').attr('disabled', '');
    } else {
        $('input[name="due_date"]').removeAttr('disabled', '');
    }
});
</script>
@yield('scripts')