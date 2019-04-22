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
            ],
        ]);
    }
}
