<?php

use Illuminate\Database\Seeder;

class OcuppationAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = date("Y-m-d H:i:s");
        DB::table("occupation_areas")->insert([
            [
                "name"       => " Area Administrativa-Financeira",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area Comercial",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area de Departamento Médico",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area de Educação",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area de Processamento de Dados",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area de Recursos Humanos",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area de Relações",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area de Suprimentos/Materiais",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area de Turismo",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area Industrial/Operações",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area Jurídica",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Area Presidencial",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
