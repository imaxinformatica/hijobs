<?php

use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("vehicles")->insert([
            [
                "name"       => "Caminhão",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Carro",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Moto",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Outro",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
