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
                "sigla"      => "RO",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 12,
                "name"       => "Acre",
                "sigla"      => "AC",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 13,
                "name"       => "Amazonas",
                "sigla"      => "AM",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 14,
                "name"       => "Roraima",
                "sigla"      => "RR",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 15,
                "name"       => "Pará",
                "sigla"      => "PA",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 16,
                "name"       => "Amapá",
                "sigla"      => "AP",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 17,
                "name"       => "Tocantins",
                "sigla"      => "TO",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 21,
                "name"       => "Maranhão",
                "sigla"      => "MA",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 22,
                "name"       => "Piauí",
                "sigla"      => "PI",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 23,
                "name"       => "Ceará",
                "sigla"      => "CE",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 24,
                "name"       => "Rio Grande do Norte",
                "sigla"      => "RN",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 25,
                "name"       => "Paraíba",
                "sigla"      => "PB",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 26,
                "name"       => "Pernambuco",
                "sigla"      => "PE",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 27,
                "name"       => "Alagoas",
                "sigla"      => "AL",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 28,
                "name"       => "Sergipe",
                "sigla"      => "SE",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 29,
                "name"       => "Bahia",
                "sigla"      => "BA",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 31,
                "name"       => "Minas Gerais",
                "sigla"      => "MG",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 32,
                "name"       => "Espírito Santo",
                "sigla"      => "ES",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 33,
                "name"       => "Rio de Janeiro",
                "sigla"      => "RJ",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 35,
                "name"       => "São Paulo",
                "sigla"      => "SP",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 41,
                "name"       => "Paraná",
                "sigla"      => "PR",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 42,
                "name"       => "Santa Catarina",
                "sigla"      => "SC",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 43,
                "name"       => "Rio Grande do Sul",
                "sigla"      => "RS",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 50,
                "name"       => "Mato Grosso do Sul",
                "sigla"      => "MS",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 51,
                "name"       => "Mato Grosso",
                "sigla"      => "MT",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 52,
                "name"       => "Goiás",
                "sigla"      => "GO",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 53,
                "name"       => "Distrito Federal",
                "sigla"      => "DF",
                "country_id" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
