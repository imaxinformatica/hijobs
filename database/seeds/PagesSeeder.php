<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("pages")->insert([
            [
                "name"   	=> "Quem somos",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Institucional",
                "urn"        =>"quem-somos",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"   	=> "Trabalhe conosco",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Institucional",
                "urn"        =>"trabalhe-conosco",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"   	=> "Termos e condições de uso",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Institucional",
                "urn"        =>"termos-e-condicoes-de-uso",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"   	=> "Política de privacidade",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Institucional",
                "urn"        =>"politica-de-privacidade",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"   	=> "Cadastre sua empresa",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Empresas",
                "urn"        =>"cadastre-sua-empresa",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"   	=> "Anuncie vagas",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Empresas",
                "urn"        =>"anuncie-vagas",
                "created_at" => $now,
                "updated_at" => $now,
            ],  [
                "name"   	=> "Busque candidatos",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Empresas",
                "urn"        =>"busque-candidatos",
                "created_at" => $now,
                "updated_at" => $now,
            ],  [
                "name"   	=> "Obtenha suporte",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Empresas",
                "urn"        =>"obtenha-suporte",
                "created_at" => $now,
                "updated_at" => $now,
            ],  [
                "name"   	=> "Cadastre seu currículo",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Candidato",
                "urn"        =>"cadastre-seu-curriculo",
                "created_at" => $now,
                "updated_at" => $now,
            ],  [
                "name"   	=> "Busque vagas",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Candidato",
                "urn"        =>"busque-vagas",
                "created_at" => $now,
                "updated_at" => $now,
            ],  [
                "name"   	=> "Acompanhe suas candidaturas",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Candidato",
                "urn"        =>"acompnahe-suas-candidaturas",
                "created_at" => $now,
                "updated_at" => $now,
            ],  [
                "name"   	=> "Obtenha suporte",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Candidato",
                "urn"        =>"obtenha-suporte",
                "created_at" => $now,
                "updated_at" => $now,
            ],  [
                "name"   	=> "Sugestões e reclamações",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Suporte",
                "urn"        =>"sugestoes-e-reclamacoes",
                "created_at" => $now,
                "updated_at" => $now,
            ],  [
                "name"   	=> "Dúvidas frequentes",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Suporte",
                "urn"        =>"duvidas-frequentes",
                "created_at" => $now,
                "updated_at" => $now,
            ],  [
                "name"   	=> "Telefones",
                "desc"	 	=> "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula. Vestibulum ac tempor turpis, sit amet fermentum justo. Proin at dignissim purus. Suspendisse efficitur maximus lorem, vitae auctor magna pharetra id. Duis lobortis viverra rhoncus. Vivamus molestie est sit amet rutrumLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut ligula ligula. Fusce egestas dui vel odio vestibulum, non congue tortor rutrum. Quisque vitae ipsum ligula.",
                "type" 		 => "Suporte",
                "urn"        =>"telefones",
                "created_at" => $now,
                "updated_at" => $now,
            ], 
        ]);
    }
}
