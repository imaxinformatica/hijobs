<?php

use Illuminate\Database\Seeder;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = date("Y-m-d H:i:s");
        DB::table("levels")->insert([
            [
                "name"       => "Ensino Fundamental (1º Grau)",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Curso extra-curricular/Profissionalizante",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Ensino Médio (2º Grau)",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Curso Técnico",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Ensino Superior",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Pós Graduação - Especialização/MBA",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Pós Graduação - Mestrado",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Pós Graduação - Doutorado",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]); 
    }
}
