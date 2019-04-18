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
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>


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
  $('#type-transaction').on('change', function(){
    var type = $(this).val();
    if (type != 1) {
      $('#due_date').hide();
    }else{
      $('#due_date').show();
    }
  });

//////////////////////////////////////////////////////////////////////////////////

  // Identifica se algum caracter foi digitado e executa a função
  $('#dataOrder input').keyup( function(){

    var total    = 0;
    var subtotal = realToFloat($('#dataOrder input[name="subtotal"]').val());
    var freight    = realToFloat($('#dataOrder input[name="freight"]').val());
    var discount = realToFloat($('#dataOrder input[name="discount"]').val());

    total = subtotal + freight - discount;

    // Fixa apenas duas casas decimais para o número
    total = total.toFixed(2);

    // Converte para o formato brasileiro
    total = floatToReal(total);

    // Passa o valor para o formulário
    $('#dataOrder input[name="total"]').val(total);

  });


  

  // Converte número do formato brasileiro para tipo float
  function realToFloat(amount){
    amount = amount.replace(/\./g, "");
    amount = amount.replace(",", ".");
    amount = parseFloat(amount);
    return amount;
  }
  // Converte número do formato float para o formato brasileiro
  function floatToReal(n, c, d, t){
    c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
  }
  $('.clear-filters').click( function(){
    $(':input','#filterForm')
    .not(':button, :submit, :reset, :hidden')
    .val('')
    .prop('checked', false)
    .prop('selected', false);
  });

  // Mask
  $( document ).ready(function() {
    $('.input-telefone').each( function(){
      var phone = $(this).val().replace(/\D/g, '');
      if(phone.length > 10){
        $(this).inputmask({"mask": "(99) 99999-9999", "placeholder":" "});
      } else {
        $(this).inputmask({"mask": "(99) 9999-99999", "placeholder":" "});
      }
    });

    $('.input-cep').inputmask({"mask": "99999-999", "placeholder":"_"});

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
    

	$('.alert .close').click( function(){
    $(this).parent().hide();
  });

	$('.input-date').datepicker({
      language: 'pt-BR',
      format: 'dd/mm/yyyy',
      autoclose: true
  });

  $(".input-money").maskMoney({
      thousands:'.', 
      decimal:',', 
      allowZero: true,
      symbolStay: true
  });
  $('#no_due_batch').change(function(){
     if ($(this).is(':checked')) {
      $('input[name="due_date"]').attr('disabled', '');
    }else{
      $('input[name="due_date"]').removeAttr('disabled', '');
    }
  });

  $('#no_due').change(function(){
     if ($(this).is(':checked')) {
      $('input[name="due_date"]').attr('disabled', '');
    }else{
      $('input[name="due_date"]').removeAttr('disabled', '');
    }
  });
</script>

