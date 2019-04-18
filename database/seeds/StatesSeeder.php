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
                "id"         => 11,
                "name"       => "Rondônia",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 12,
                "name"       => "Acre",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 13,
                "name"       => "Amazonas",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 14,
                "name"       => "Roraima",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 15,
                "name"       => "Pará",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 16,
                "name"       => "Amapá",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 17,
                "name"       => "Tocantins",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 21,
                "name"       => "Maranhão",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 22,
                "name"       => "Piauí",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 23,
                "name"       => "Ceará",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 24,
                "name"       => "Rio Grande do Norte",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 25,
                "name"       => "Paraíba",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 26,
                "name"       => "Pernambuco",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 27,
                "name"       => "Alagoas",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 28,
                "name"       => "Sergipe",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 29,
                "name"       => "Bahia",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 31,
                "name"       => "Minas Gerais",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 32,
                "name"       => "Espírito Santo",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 33,
                "name"       => "Rio de Janeiro",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 35,
                "name"       => "São Paulo",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 41,
                "name"       => "Paraná",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 42,
                "name"       => "Santa Catarina",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 43,
                "name"       => "Rio Grande do Sul",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 50,
                "name"       => "Mato Grosso do Sul",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 51,
                "name"       => "Mato Grosso",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 52,
                "name"       => "Goiás",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 53,
                "name"       => "Distrito Federal",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
