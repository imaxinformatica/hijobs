<?php

use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("languages")->insert([
            [
                "name"       => "Inglês",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Espanhol",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Francês",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Alemão",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Mandarim",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Italiano",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Outras",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
