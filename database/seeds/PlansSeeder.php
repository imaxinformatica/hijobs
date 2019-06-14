<?php

use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("plans")->insert([
            [
                "code" => 'CB124BB89898BBDDD4DA0F9503D7C966',
                "name"       => "Empresa",
                "type" => 'empresa',
                "value" => 250.00,
            ], [
                "code" => '9E472BDD3636774EE44CEFB097C76CA4',
                "name"       => "Candidato",
                "type" => 'candidato',
                "value" => 89.90,
            ],
        ]); 
    }
}
