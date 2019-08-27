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
                "code" => 'C72809486767F7B44406FF9D6EAD1B1F',
                "name"       => "Empresa",
                "type" => 'empresa',
                "value" => 250.00,
                "trial_period_duration" => "7",
            ], 
            [
                "code" => 'F12BFF845050F29114F8AF95D72113A8',
                "name"       => "Empresa",
                "type" => 'empresa',
                "value" => 250.00,
                "trial_period_duration" => "7",
            ], 
        ]); 
    }
}
