<footer>
     <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Institucional</b></p>
                    <ul>
                        <li><a href="#">Quem somos</a></li>
                        <li><a href="#">Trabalhe conosco</a></li>
                        <li><a href="#">Termos e condições de uso</a></li>
                        <li><a href="#">Política de privacidade</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Empresas</b></p>
                    <ul>
                        <li><a href="#">Cadastre sua empresa</a></li>
                        <li><a href="#">Anuncie vagas</a></li>
                        <li><a href="#">Busque candidatos</a></li>
                        <li><a href="#">Obtenha suporte</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Candidato</b></p>
                    <ul>
                        <li><a href="#">Cadastre seu currículo</a></li>
                        <li><a href="#">Busque vagas</a></li>
                        <li><a href="#">Acompanhe suas candidaturas</a></li>
                        <li><a href="#">Obtenha suporte</a></li>
                    </ul>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="box-footer">
                    <p><b>Suporte</b></p>
                    <ul>
                        <li><a href="#">Sugestões e reclamações</a></li>
                        <li><a href="#">Dúvidas frequentes</a></li>
                        <li><a href="#">Telefones</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="creditos">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="images/logo.png"><br>
                    <span>&copy; 2019 Hi Jobs. Todos os direitos reservados.</span>
                </div>
            </div>
        </div>
    </div>
</footer> 

<script type="text/javascript">
    $('#top-candidate').click( function(){
        $(this).addClass('active');
        $('#top-company').removeClass('active');
    });

    $('#top-company').click( function(){
        $(this).addClass('active');
        $('#top-candidate').removeClass('active');
    }); 
</script>  