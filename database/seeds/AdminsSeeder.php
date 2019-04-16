<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("admins")->insert([
            [	
                "name"       	=> "hijobs",
                "email"       	=> "hijobs@hijobs.com",
                "password"      => bcrypt("hijobs"),
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], 
        ]);
    }
}
