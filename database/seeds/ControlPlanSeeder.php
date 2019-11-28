<?php

use Illuminate\Database\Seeder;

class ControlPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("limits")->insert([
            [	
                "qty"       	=> 30,
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], 
        ]);
    }
}
