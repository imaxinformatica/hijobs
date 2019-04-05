<?php

use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("states")->insert([
            [
                "name"       => "São Paulo",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Acre",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Amazonas",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Roraima",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Pará",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Amapá",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Tocantins",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Maranhão",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Piauí",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Ceará",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Rio Grande do Norte",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Paraíba",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Pernambuco",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Alagoas",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Sergipe",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Bahia",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Minas Gerais",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Espírito Santo",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Rio de Janeiro",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Rondônia",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Paraná",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Santa Catarina",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Rio Grande do Sul",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Mato Grosso do Sul",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Mato Grosso",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Goiás",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Distrito Federal",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
