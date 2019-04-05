<?php

use Illuminate\Database\Seeder;

class SpecialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("specials")->insert([
            [
                "name"       => "Auditiva",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Física",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Visual",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Reabilitados",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Psicossocial",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);

    }
}
