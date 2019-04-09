@extends('index.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')

<section class="search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 search-job col-sm-offset-4">
                <h1>Buscar vagas</h1>
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="office" type="text" name="office" placeholder="Cargo ou Área Profissional">
                            <p>Exemplos: Vendedor, motorista, estágios etc.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="place" type="text" name="place" placeholder="Cidade, estado ou região">
                            <p>Exemplos: São Paulo, Rio de Janeiro etc.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button class="btn-orange">
                                BUSCAR
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</section>

<section class="new-job">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Como conseguir seu novo emprego</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="images/job1.png" alt="Passo-a-passo">
                    <p>Cadastre seu <br>currículo</p>
                    <div class="order">
                        <p>1</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="images/job2.png" alt="Passo-a-passo">
                    <p>Candidate-se <br>a vagas</p>
                    <div class="order vacancy">
                        <p>2</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="box-new-job">
                    <img src="images/job3.png" alt="Passo-a-passo">
                    <p>Acompanhe suas <br>candidaturas</p>
                    <div class="order application">
                        <p>3</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-5">
                <button class="btn-orange">
                    Cadastrar currículo
                </button> 
            </div>
        </div>
    </div>
</section>

<section class="result-job">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p><b>AS VAGAS MAIS BUSCADAS</b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="box-result-job">
                    <span>Gerente Bancário</span><br>
                    <p class="pay">De R$5.000,00 a R$15.000,00</p>
                    <p><b>5 vagas</b> em São Paulo, SP</p>
                    <a href="#">Buscar</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-result-job">
                    <span>Gerente Bancário</span><br>
                    <p class="pay">De R$5.000,00 a R$15.000,00</p>
                    <p><b>5 vagas</b> em São Paulo, SP</p>
                    <a href="#">Buscar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="box-result-job">
                    <span>Gerente Bancário</span><br>
                    <p class="pay">De R$5.000,00 a R$15.000,00</p>
                    <p><b>5 vagas</b> em São Paulo, SP</p>
                    <a href="#">Buscar</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box-result-job">
                    <span>Gerente Bancário</span><br>
                    <p class="pay">De R$5.000,00 a R$15.000,00</p>
                    <p><b>5 vagas</b> em São Paulo, SP</p>
                    <a href="#">Buscar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p class="title-section"><b>ESCOLHA A MELHOR EMPRESA PARA TRABALHAR</b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5ths">
                <div class="box-company">
                    <img src="images/empresa.jpg" alt="Empresa">
                    <p>5 vagas</p>
                </div>
            </div>
            <div class="col-sm-5ths">
                <div class="box-company">
                    <img src="images/empresa.jpg" alt="Empresa">
                    <p>5 vagas</p>
                </div>
            </div>
            <div class="col-sm-5ths">
                <div class="box-company">
                    <img src="images/empresa.jpg" alt="Empresa">
                    <p>5 vagas</p>
                </div>
            </div>
            <div class="col-sm-5ths">
                <div class="box-company">
                    <img src="images/empresa.jpg" alt="Empresa">
                    <p>5 vagas</p>
                </div>
            </div>
            <div class="col-sm-5ths">
                <div class="box-company">
                    <img src="images/empresa.jpg" alt="Empresa">
                    <p>5 vagas</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p class="title-section"><b>ENCONTRE VAGAS NAS MAIORES CIDADES</b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="box-cities">
                    <ul>
                        <li><a href="#">São Paulo</a></li>
                        <li><a href="#">Rio de Janeiro</a></li>
                        <li><a href="#">Curitiba</a></li>
                        <li><a href="#">Belo Horizonte</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-cities">
                    <ul>
                        <li><a href="#">Porto Alegre</a></li>
                        <li><a href="#">Campinas</a></li>
                        <li><a href="#">Goiânia</a></li>
                        <li><a href="#">Salvador</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-cities">
                    <ul>
                        <li><a href="#">Fortaleza</a></li>
                        <li><a href="#">Sorocaba</a></li>
                        <li><a href="#">Manaus</a></li>
                        <li><a href="#">Campo Grande</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="box-cities">
                    <ul>
                        <li><a href="#">Uberlândia</a></li>
                        <li><a href="#">Maringá</a></li>
                        <li><a href="#">Cuiabá</a></li>
                        <li><a href="#">Barueri</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@stop