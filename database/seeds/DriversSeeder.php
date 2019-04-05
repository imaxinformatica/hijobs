<?php

use Illuminate\Database\Seeder;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("drivers")->insert([
            [
                "name"       => "A",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "B",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "C",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "D",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "E",
                "created_at" => $now,
                "updated_at" => $now,
            ], 
        ]);
    }
}
