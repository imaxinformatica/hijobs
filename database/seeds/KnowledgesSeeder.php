<?php

use Illuminate\Database\Seeder;

class KnowledgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("knowledges")->insert([
            [	
                "name"       => "Banco de Dados",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Programação",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Gráficos/Web",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Aplicações de escritório",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Sistemas Operacionais",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Sistemas Operacionais",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Outros Programas",
                "created_at" => $now,
                "updated_at" => $now,
            ], 
        ]);
    }
}
