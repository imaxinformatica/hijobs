<?php

use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table("courses")->insert([
    		[
    			"name"  =>  "Ensino Fundamental (1º grau)",
    			"level_id"  =>  1,
    		], [
    			"name"  =>  "Acordeon",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Acordeon",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "ActionScript MX",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Administrativo",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Aeromoça",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Agente de turismo",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Artesanato em madeira",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Artes Plásticas",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Assesoria fiscal e tributária",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "ATP Poser 4,",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Autocad",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Auxiliar clínica veterinária",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Auxiliar de enfermagem",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Auxiliar de jardim de infância",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Auxiliar de odontologia",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Avaliação de empresas",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Cabeleireiro",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Carpintaria",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Cenografia",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Cobranças por telefone",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Colorimetria aplicada",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Construção predial",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Consultor em segurança Microsoft 2003",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Contabilidade analítica",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Contabilidade básica",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Contabilidade de custos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Contabilidade geral",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Contabilidade para executivos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Contabilidade para servidores",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Contabilidade pública",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Contabilidade tributária",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Controle de gestão",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Corte e costura",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Costura em couro",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Criação/gestão de cursos de e-learning",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Culinária",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Curso de língua inglesa",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Curso de línguas estrangeiras",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Dança",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Decoração",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Desenho",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Desenho 3Dstudio Max-2003",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Desenho de moda",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Desenho em quadrinhos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Desenho gráfico",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Desenvolvimento do poder mental",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Design de interiores",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Dietética e nutrição",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Direito comercial",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Dreamweaver MX",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Educação meio-ambiental",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "EJB",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Eletricista",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Eletrônica e micro-eletrônica",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Encanador",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Energia solar",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Especialização em audiovisuais",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Especialização em Comércio eletrônico",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Especialização em Contabilidade Gerencial",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Especialização em desenho em movimento",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Especialização em direção comercial e marketing",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Especialização em direito de novas tecnologias",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Especialização em prótese dentária",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Estética",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Fireworks MX",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Fiscalização de operações financeiras",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Flash MX",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Fotografia",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Gestão atuarial e financeira",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Gestão de contas",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Gestão de tesouraria",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Gestão em eventos culturais e desportivos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Gestão financeira de pequenas empresas",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Gestão meio-ambiental",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Guitarra",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Imposto de renda",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Impostos de produtos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Informática musical",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Iniciação à música",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Instalação/manutenção de PC's",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Instalador de gás",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Introdução ao Windows, Word e Internet",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "J2EE",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "JAVA 2003 Professional",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Locução e sonoplastia",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Manutenção de ar condicionado",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Master Web",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Mecânico de motos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Mecânico do automóvel",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Modos de pagamentos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Montagem de cinema e produção TV",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Motores a diesel",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "MS Project",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Normas internacionais de contabilidade",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Oficina/chapista",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Pedreiro",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Photoshop 6.0",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "PHP e MySQL",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Piano",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Pigmentos e corantes",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Pintura",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Planejamento fiscal internacional",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Produção multimídia",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Projetista mecânico",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Proteção Civil",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Recepcionista/Telefonista",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Roteiro de cinema e TV",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Segurança e direito do trabalho",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Serralheiro",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Sistemas micro-informáticos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Soldador",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Supervisor de obras",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Teatro e espaço cênico",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Teclado",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Técnico de alimentos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Técnico em plásticos",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Técnico em tratamento de águas",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Técnico meio-ambiente",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Telemarketing",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Tradutor / Intérprete",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Tunning",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Vigilante de segurança",
    			"level_id"  =>  2,
    		], [
    			"name"  =>  "Ensino Médio (2º Grau)",
    			"level_id"  =>  3,
    		], [
    			"name"  =>  "Açúcar e álcool",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Administração",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Aeroportuário ",
    			"level_id"  =>  4,

    		], [
    			"name"  =>  "Agenciamento de viagem",
    			"level_id"  =>  4,
    		],[
    			"name"  =>  "Agricultura",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Agrimensura ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Agroecologia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Agroindústria",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Agronegócio",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Agropecuária",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Alimentos",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Análises clínicas",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Análises químicas",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Apicultura ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Aquicultura",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Arte circense",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Arte dramática",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Artesanato ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Artes gráficas",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Artes visuais",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Atividades físicas e desportivas",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Automação industrial",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Biblioteconomia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Calçados ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Canto",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Celulose e papel ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Cerâmica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Citopatologia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Comércio ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Comércio exterior",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Composição e arranjo",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Comunicação visual",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Confeitaria ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Conservação e restauro",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Construção naval",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Contabilidade",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Controle ambiental",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Cooperativismo ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Cozinha",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Curtimento",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Dança",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Departamento pessoal",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Desenho",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Desenho de construção civil",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Design de embalangens",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Design de interiores",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Design de joias",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Design de móveis",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Design gráfico",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Documentação musical",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Edificações",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Eletroeletrônica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Eletromecânica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Eletrônica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Eletrotécnica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Enfermagem",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Equipamentos biomédicos",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Estética",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Estradas",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Eventos",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Fabricação de instrumentos musicais",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Fabricação mecânica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Farmácia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Finanças",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Florestas",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Fotografia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Geodésia e cartografia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Geologia ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Geoprocessamento",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Gerência em saúde",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Gráfica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Guia de turismo",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Hidrologia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Hospedagem",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Imagem pessoal",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Imobilizações ortopédicas",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Impressão gráfica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Impressão offset ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Industrial",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Informática",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Informática para internet",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Infraestrutura escolar",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Instrumentador cirúrgico",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Instrumento musical",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Lazer",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Logística",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Magistério",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Manutenção automotiva",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Manutenção de aeronaves",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Manutenção e suporte em informática",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Marketing",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Massoterapia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Mecânica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Mecatrônica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Meio ambiente",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Metalurgia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Meteorologia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Mineração",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Modelagem do vestuário",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Móveis",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Multimídia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Nutrição e dietética",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Óptica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Paisagismo",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Panificação ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Petróleo e gás",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Petroquímica",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Plásticos",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Portos ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Pré-impressão",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Previdência social",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Processamento de pescado",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Produção de áudio e vídeo",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Produção de moda",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Programação de jogos digitais",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Prótese dentária",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Publicidade",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Qualidade",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Química",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Rádio e televisão",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Radiologia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Recursos humanos",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Recursos minerais ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Recursos pesqueiros ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Redes de computadores",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Refrigeração e climatização",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Regência",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Registros e informações em saúde",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Saneamento ",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Saúde",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Saúde bucal",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Secretariado",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Secretaria escolar",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Segurança do trabalho",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Serviços de condomínio",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Serviços de restaurante e bar",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Serviços públicos",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Sistemas a gás",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Sistemas de comutação",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Sistemas de transmissão",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Tabela de convergência",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Tecelagem",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Telecomunicações",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Tradutor e intérprete",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Trânsito",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Transporte de cargas",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Transporte ferroviário",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Transporte rodoviário",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Transportes",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Vendas",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Vestuário",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Veterinária",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Vigilância em saúde",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Viticultura e enologia",
    			"level_id"  =>  4,

    		],[
    			"name"  =>  "Web design",
    			"level_id"  =>  4,
    		],[
    			"name"  =>  "Zootecnia",
    			"level_id"  =>  4,
    		], [
    			"name"  =>  "Administração de empresas",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Agrimensura",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Agroecologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Agroindústria",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Agronegócio",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Agronomia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Análise e desenvolvimento de sistemas",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Antropologia social e cultural",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Aquicultura",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Arqueologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Arquitetura e urbanismo",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Arquivologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Automação industrial",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Biblioteconomia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Biocombustíveis",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Biologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Biomedicina",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Bioquímica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Cafeicultura",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Ciências ambientais",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Ciências atuariais e financeiras",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Ciências contábeis",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Ciências da computação",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Ciências da religião",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Ciências do trabalho",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Ciências políticas",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Ciências sanitárias",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Ciências sociais",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Cinema",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Comércio exterior",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Comunicação audiovisual",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Comunicações aeronáuticas",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Construção de Edifícios",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Construção naval",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Dança",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Desenho de interiores",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Desenho de moda",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Desenho de produto",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Desenho gráfico",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Desenho industrial",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Design de Interiores",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Direito",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Economia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Educação artística",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Educação física",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Educação social",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Eletrônica industrial",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Eletrotécnica industrial",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Enfermagem",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia aeronáutica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia Agrônoma",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia ambiental",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia cartográfica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia civil",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia da computação",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia de alimentos",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia de minas",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia de produção/industrial",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia de telecomunicações",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia elétrica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia eletrônica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia em Montes",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia geológica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia mecânica/mecatrônica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia metalúrgica e de materiais",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia Naval",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia organizacional",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia química",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia técnica agrícola",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia técnica de desenho industrial",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia técnica de obras públicas",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Engenharia topográfica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Enologia e viticultura",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Esporte e turismo",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Estatística",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Estudos internacionais e inter-culturais",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Eventos",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Farmácia e Bioquímica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Filosofia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Física",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Fisioterapia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Fonoaudiologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Fotografia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Fotointeligência",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Gastronomia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Geografia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Geologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Gestão ambiental",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Gestão de qualidade",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Gestão de Recursos Humanos",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Gestão e administração pública",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Gestão Financeira",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Gestão hospitalar",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Gestão portuária",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Hidrologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "História",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Hotelaria",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Instrumentação e Controle",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Investigação privada",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Jogos digitais",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Jornalismo",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Letras",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Letras - Alemão ",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Letras - Árabe",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Letras - Espanhol",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Letras - Francês",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Letras - Inglês",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Letras - Italiano",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Letras - Línguas e culturas românicas",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Letras - Literatura e língua portuguesa",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Lingüística",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Logística",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  " Marketing",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Matemática",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Mecânica de precisão",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Medicina",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Meteorologia e climatologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Náutica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Negócios imobiliários",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Nutrição",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Obstetrícia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Oceanografia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Odontologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Oftálmica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Paisagismo",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Papel e Celulose",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Pedagogia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Pedagogia - Educação secundária",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Pedologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Petróleo e Gás",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Podologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Polímeros",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Prevenção e segurança do trabalho",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Prevenção e segurança integral",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Processos Gerenciais",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Processos Químicos",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção cultural",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção de cachaça",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção de Cosméticos",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção fonográfica",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção Industrial",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção joalheira",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção moveleira",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção multimídia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção pesqueira",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção sucroalcooleira",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Produção têxtil",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Psicologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Psicopedagogia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Publicidade e propaganda",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Química",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Radiologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Refrigeração e Climatização",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Relações Internacionais",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Relações públicas",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Saneamento Ambiental",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Secretariado",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Serviço social",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Silvicultura",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Sistemas de telecomunicações",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Soldagem",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Teatro",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Tecnologia da Informação",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Telemática",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Teologia",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Terapia ocupacional",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Tradução e interpretação",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Transporte aéreo",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Transporte marítimo",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Turismo",
    			"level_id"  =>  5,
    		], [
    			"name"  =>  "Administração de empresas",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Arqueologia e restauração",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Atendimento preventivo",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Ciências médicas",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Dança-Educação",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Desenho do espaço do trabalho",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Desenho e estratégias de comunicação",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Desenho e novos formatos expositivos",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Desenho e produção gráfica",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Direção e administração em recursos humanos",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Direito",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Economia",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Engenharias",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Especialização em contabilidade e auditoria",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Física",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Fonoaudiologia",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Gestão e alimentos",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "História e sociologia",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Hotelaria e Turismo",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Informática",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Ligüística, Letras e Artes",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Marketing",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Matemática",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Mediação de conflitos",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Melhora ambiental de produtos e processos",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Microeletrônica",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Neuro-psicologia clínica",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Odontologia",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Operações logísticas",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Pedagogia da educação",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Petroquímica",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Pós-graduação desenho e uso em Internet",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Psicologia clínica infanto-juvenil",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Psicologia Social",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Psicomotricidade",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Psico-oncologia",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Psiquiatria",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Publicidade e Propaganda",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Química",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Reabilitação cognitiva",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Relações Internacionais",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Serviço social",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Técnicas de gestão empresarial",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Terapia sexual e de casal",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Transtornos da linguagem escrita. Dislexia",
    			"level_id"  =>  6,
    		], [
    			"name"  =>  "Administração de Empresas",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Administração hospitalar",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Análises de sistemas",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Animação Telemática/Material Didático virtual",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Arquitetura e Urbanismo",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Banco e finanças",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Biblioteconomia e documentação",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Ciências biológicas",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Ciências Contábeis",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Ciências da Saúde",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Ciências Exatas",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Ciências Humanas",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Ciências sociais aplicadas",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Cinematografia",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Comércio Exterior",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Comunicação audiovisual",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Comunicação Social",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Cultura e Sociedade",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Dança-Educação",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Desenho de interiores",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Desenho gráfico",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Desenho web",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Direção administrativo financeira",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Direção de TI na empresa",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Direção e gestão de centros educativos",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Direção e gestão de recursos humanos",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Direito",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Direito do meio ambiente",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Direito do trabalho",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Direito imobiliário, urbanístico e a edificação",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Direito Público",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "E-commerce",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Economia empresarial",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Engenharia Civil",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Engenharia do meio ambiente",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Engenharia do software",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Engenharia Elétrica/Eletrônica",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Engenharia Mecânica",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Engenharia Química",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Fonoaudiologia",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Gestão ambiental",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Gestão de energias alternativas",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Gestão de políticas públicas",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Indústria Farmacêutica",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Internet",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Ligüística, Letras e Artes",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Marketing",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "MBA (Administração e Direção)",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Medicina",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Mestrado em Marketing",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Mestrado Microsoft .NET MCAD-2003",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Mestrado profissional meio Oracle 9i-2003",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Música",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Oceanografia",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Odontologia",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Operações logísticas",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Pedagogia da educação",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Prevenção e Segurança do Trabalho",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Programação JAVA",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Programação Web",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Psicologia clínica e da saúde",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Química",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Tecnologia da informação",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Telecomunicações",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Tradução e interpretação",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Turismo",
    			"level_id"  =>  7,
    		], [
    			"name"  =>  "Administração - Comércio exterior",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Administração e direção de empresas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Administração hoteleira",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Administração - Marketing",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Administração turística",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Agronomia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Antropologia social e cultural",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Arqueologia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Arquitetura e urbanismo",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Arquivologia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Auditoria e censura jurada de contas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Aviação comercial. Piloto comercial",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Biblioteconomia e documentação",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Biologia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Bioquímica",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências ambientais",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências atuariais e financeiras",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências contábeis",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências da computação",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências do trabalho",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências econômicas e empresariais",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências religiosas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências sanitárias",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências sociais e políticas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Ciências sociais e políticas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Cinema",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Comunicação audiovisual",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Comunicação social - Jornalismo",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Comunicação social - Publicidade e propaganda",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Comunicação social - Relações públicas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Dança",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Desenho gráfico",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Desenho industrial",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Direito",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Direito ambiental",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Direito internacional",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Economia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Educação artística - Artes cênicas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Educação artística - Artes plásticas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Educação artística - Desenho",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Educação física",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Educação social",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Enfermagem e obstetrícia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia aeronáutica",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia agronômica",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia ambiental",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia cartográfica",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia civil",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia de alimentos",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia de computação",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia de produção/industrial",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia de telecomunicações",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia elétrica/eletrônica",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia mecânica/mecatrônica",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia organizacional",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia química",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia técnica agrícola",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia técnica de desenho industrial",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Engenharia técnica de obras públicas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Enologia e viticultura",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Esporte e turismo",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Estatística",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Estudos da Ásia Oriental",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Estudos internacionais e inter-culturais",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Filosofia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Física",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Fisioterapia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Fonoaudiologia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Fotografia e criação digital",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Geografia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Gestão e administração pública",
    			"level_id" => 8,
    		], [
    			"name"  =>  "História",
    			"level_id" => 8,
    		], [
    			"name"  =>  "História da arte",
    			"level_id" => 8,
    		], [
    			"name"  =>  "História e ciências da música",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Indústria farmacêutica",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Investigação privada",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Letras - Alemão ",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Letras - Árabe",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Letras clássicas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Letras - Espanhol",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Letras - Francês",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Letras - Inglês",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Letras - Italiano",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Letras - Línguas e culturas românicas",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Letras - Literatura e língua portuguesa",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Lingüística",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Logística",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Máquinas navais",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Matemática",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Medicina",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Meteorologia e climatologia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Náutica e transporte marítimo",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Nutrição humana e dietética",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Oceanografia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Odontologia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Outras Engenharias",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Paisagismo",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Pedagogia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Pedagogia - Educação infantil",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Pedagogia - Educação Música",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Pedagogia - Educação primária",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Pedagogia - Educação secundária",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Pedagogia especial",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Pedagogia - Língua estrangeira",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Piloto de transporte linha aérea",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Prevenção e segurança do trabalho",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Prevenção e segurança integral",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Psicologia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Psicopedagogia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Química",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Recursos Humanos",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Secretariado executivo e bilíngue",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Serviço social",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Sociologia",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Teatro",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Tecnologia ambiental",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Tecnologia da informação",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Terapia ocupacional",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Tradução e interpretação",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Turismo",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Veterinária",
    			"level_id" => 8,
    		], [
    			"name"  =>  "Zootécnia",
    			"level_id" => 8,
    		],
    	]);
	}
}
