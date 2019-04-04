<?php $pagina = 'index-candidato'; ?>

<?php include 'header.php'; ?>

<section class="result-search cadastro-dados">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Passo a passo para concluir seu currículo</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="etapas box-result-search">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="number">
                                <div class="evolucao">
                                    <p>1</p>
                                </div>
                                <h3>Dados de acesso</h3>
                            </div>
                            <img src="images/barra.png">
                        </div>
                        <div class="col-sm-4">
                            <div class="number">
                                <div class="evolucao">
                                    <p>2</p>
                                </div>
                                <h3>Dados do currículo</h3>
                            </div> 
                            <img src="images/barra.png">                       
                        </div>
                        <div class="col-sm-4">
                            <div class="number">
                                <div class="evolucao">
                                    <p>3</p>
                                </div>
                                <h3>Melhorar currículo</h3>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box-result-search result-vacancies dados-pessoais">
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Dados pessoais</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="pais">País</label>
                                <select name="pais">
                                    <option selected disabled>Selecione</option>
                                    <option>Brasil</option>
                                    <option>Brasil</option>
                                    <option>Brasil</option>
                                    <option>Brasil</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="cpf">CEP</label>
                                <input type="text" name="cpf" placeholder="Digite seu CPF">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="phone">Telefone</label>
                                <input type="text" name="phone" placeholder="Seu telefone">
                            </div>
                            <div class="col-sm-5">
                                <label for="nascimento">Data de nascimento</label>
                                <input type="text" name="nascimento" placeholder="Sua data de nascimento">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="estado">Estado civil</label>
                                <select name="estado">
                                    <option selected disabled>Selecione</option>
                                    <option>Solteiro</option>
                                    <option>Solteiro</option>
                                    <option>Solteiro</option>
                                    <option>Solteiro</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="sexo">Sexo</label>
                                <select name="sexo">
                                    <option selected disabled>Selecione</option>
                                    <option>Masculino</option>
                                    <option>Masculino</option>
                                    <option>Masculino</option>
                                    <option>Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="deficiencia"><span class="checkmark"></span>Pessoa com deficiência física</label>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="auditiva"><span class="checkmark"></span>Auditiva</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="fisica"><span class="checkmark"></span>Física</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="visual"><span class="checkmark"></span>Visual</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="reabilitados"><span class="checkmark"></span>Reabilitados</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="psicossocial"><span class="checkmark"></span>Psicossocial</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="condicoes" style="margin-top: 20px;">Condições especiais</label>
                                <textarea name="condicoes" placeholder="Descreva condições especiais de transporte, trabalho, acompanhamento etc."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Redes sociais</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" name="linkedin" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" placeholder="Informe a url do seu perfil">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" placeholder="Informe a url do seu perfil">
                            </div>
                            <div class="col-sm-6">
                                <label for="blog">Blog</label>
                                <input type="text" name="blog" placeholder="Informe a url do seu perfil">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Formação acadêmica</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn-result">
                                    <div class="border">
                                        <img src="images/icon-plus.png">
                                    </div>
                                    <p>Incluir nova</p>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Experiência profissional</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn-result">
                                    <div class="border">
                                        <img src="images/icon-plus.png">
                                    </div>
                                    <p>Incluir nova</p>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Idiomas</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn-result">
                                    <div class="border">
                                        <img src="images/icon-plus.png">
                                    </div>
                                    <p>Incluir novo</p>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Conhecimentos de informática</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn-result">
                                    <div class="border">
                                        <img src="images/icon-plus.png">
                                    </div>
                                    <p>Incluir novo</p>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Informações complementares</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="info-adc">Tipo de habilitação para dirigir</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="tipo"><span class="checkmark"></span>A</label>
                            </div>
                            <div class="col-sm-1">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="tipo"><span class="checkmark"></span>B</label>
                            </div>
                            <div class="col-sm-1">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="tipo"><span class="checkmark"></span>C</label>
                            </div>
                            <div class="col-sm-1">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="tipo"><span class="checkmark"></span>D</label>
                            </div>
                            <div class="col-sm-1">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="tipo"><span class="checkmark"></span>E</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="info-adc" style="margin-top: 20px;">Possui veículo próprio? Qual?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="veiculo"><span class="checkmark"></span>Caminhão</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="veiculo"><span class="checkmark"></span>Carro</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="veiculo"><span class="checkmark"></span>Moto</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="checkbox" name="tipo"><span class="checkmark"></span>Outro</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="info-adc" style="margin-top: 20px;">Tem disponibilidade para viajar?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" name="viajar"><span class="checkmark check-radio"></span>Sim</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" name="viajar"><span class="checkmark check-radio"></span>Não</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="info-adc" style="margin-top: 20px;">Tem disponibilidade para mudar de residência?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" name="casa"><span class="checkmark check-radio"></span>Sim</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="lbl-caracteristicas"><input type="radio" name="casa"><span class="checkmark check-radio"></span>Não</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Objetivos profissionais</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="jornada">Jornada</label>
                                <select name="jornada">
                                    <option selected disabled>Selecione</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="contrato">Tipo de contrato</label>
                                <select name="contrato">
                                    <option selected disabled>Selecione</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="nivelmin">Nível hierárquico mínimo</label>
                                <select name="nivelmin">
                                    <option selected disabled>Selecione</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="nivelmax">Nível hierárquico máximo</label>
                                <select name="nivelmax">
                                    <option selected disabled>Selecione</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="pretencao">Pretenção salarial mínima</label>
                                <input type="text" name="pretencao" placeholder="Seu telefone">
                            </div>
                            <div class="col-sm-5">
                                <label for="estadotrab">Estado onde deseja trabalhar</label>
                                <select name="estadotrab">
                                    <option selected disabled>Selecione</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="btn-orange">Salvar meu currículo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </div> 
</section>

<?php include 'footer.php'; ?>