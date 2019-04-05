<?php

use Illuminate\Database\Seeder;

class JourneysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("journeys")->insert([
            [
                "name"       => "Parcial Manhãs",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Parcial Tardes",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Parcial Noites",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Período Integral",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Noturno",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]); 
    }
}
