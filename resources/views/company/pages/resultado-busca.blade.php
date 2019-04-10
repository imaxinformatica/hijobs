@extends('company.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')
<section class="result-search">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="box-result-search">
                    <form method="POST" action="#">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="cargo">Cargo ou área profissional</label>
                                <select name="cargo">
                                    <option selected disabled>Selecione</option>
                                    <option>Analista de Sistemas</option>
                                    <option>Analista de Sistemas</option>
                                    <option>Analista de Sistemas</option>
                                    <option>Analista de Sistemas</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="cidade">Cidade, estado ou região</label>
                                <select name="cidade">
                                    <option selected disabled>Selecione</option>
                                    <option>São Paulo</option>
                                    <option>São Paulo</option>
                                    <option>São Paulo</option>
                                    <option>São Paulo</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="salario">Salário desejado</label>
                                <select name="salario">
                                    <option selected disabled>Selecione</option>
                                    <option>R$1.000,00 a 2.500,00</option>
                                    <option>R$1.000,00 a 2.500,00</option>
                                    <option>R$1.000,00 a 2.500,00</option>
                                    <option>R$1.000,00 a 2.500,00</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="contrato">Tipo de contrato</label>
                                <select name="contrato">
                                    <option selected disabled>Selecione</option>
                                    <option>Estágio</option>
                                    <option>Estágio</option>
                                    <option>Estágio</option>
                                    <option>Estágio</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn-blue">
                                    Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <img class="icon-vagas" src="images/icon-result.png">
                        <p class="total-vagas">215 vagas de emprego para <b>analista de sistemas</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <span>Analista de Sistemas Sênior</span>
                            <p id="salario">De R$7.000,00 a R$15.000,00<p>
                            <p><b>5 vagas</b></p>
                            <p>Analisar o bom desempenho de sistemas implantados, solucionar problemas técnicos e elaborar manuais. Experiência com Docker e com micro serviços.</p>
                            <button class="btn-result">
                                <div class="border">
                                    <img src="images/icon-plus.png">
                                </div>
                                <p>Mais detalhes da vaga</p>
                            </button>
                        </div>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <span>Analista de Sistemas Sênior</span>
                            <p id="salario">De R$7.000,00 a R$15.000,00<p>
                            <p><b>5 vagas</b></p>
                            <p>Analisar o bom desempenho de sistemas implantados, solucionar problemas técnicos e elaborar manuais. Experiência com Docker e com micro serviços.</p>
                            <button class="btn-result">
                                <div class="border">
                                    <img src="images/icon-plus.png">
                                </div>
                                <p>Mais detalhes da vaga</p>
                            </button>
                        </div>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-result-search result-vacancies">
                            <span>Analista de Sistemas Sênior</span>
                            <p id="salario">De R$7.000,00 a R$15.000,00<p>
                            <p><b>5 vagas</b></p>
                            <p>Analisar o bom desempenho de sistemas implantados, solucionar problemas técnicos e elaborar manuais. Experiência com Docker e com micro serviços.</p>
                            <button class="btn-result">
                                <div class="border">
                                    <img src="images/icon-plus.png">
                                </div>
                                <p>Mais detalhes da vaga</p>
                            </button>
                        </div>   
                    </div>
                </div>
            </div>
        </div>        
    </div> 
</section>
@stop