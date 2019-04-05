<?php

use Illuminate\Database\Seeder;

class HierarchysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("hierarchys")->insert([
            [
                "name"       => "Estagiário",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Operacional",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Auxiliar",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Assistente",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Trainee",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Encarregado",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Supervisor",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Consultor",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Especialista",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Coordenador",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Gerente",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Diretor",
                "created_at" => $now,
                "updated_at" => $now,
            ], 
        ]);
    }
}
