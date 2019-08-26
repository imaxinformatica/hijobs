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
                "name"       => " Área Administrativa-Financeira",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área Comercial",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área de Departamento Médico",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área de Educação",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área de Processamento de Dados",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área de Recursos Humanos",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área de Relações",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área de Suprimentos/Materiais",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área de Turismo",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área Industrial/Operações",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área Jurídica",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Área Presidencial",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
