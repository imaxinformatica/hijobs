<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContractTypesSeeder::class);
        $this->call(DriversSeeder::class);
        $this->call(HierarchiesSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(JourneysSeeder::class);
        $this->call(KnowledgesSeeder::class);
        $this->call(SubknowledgesSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(OcuppationAreasSeeder::class);
        $this->call(SpecialsSeeder::class);
        $this->call(VehiclesSeeder::class);
        $this->call(CountriesSeeder::class);
        
    }
}
