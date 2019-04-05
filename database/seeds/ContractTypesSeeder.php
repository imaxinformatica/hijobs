<?php

use Illuminate\Database\Seeder;

class ContractTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("contract_types")->insert([
            [
                "name"       => "Autônomo",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Cooperado",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Efetivo - CLT",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Estágio",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Outros",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Prestador de Serviços (PJ)",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Temporário",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Trainee",
                "created_at" => $now,
                "updated_at" => $now,
            ], 
        ]);

    }
}
