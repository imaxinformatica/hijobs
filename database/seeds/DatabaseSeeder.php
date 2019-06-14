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
        $this->call(PlansSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(LevelsSeeder::class);
        $this->call(DriversSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(JourneysSeeder::class);
        $this->call(SpecialsSeeder::class);
        $this->call(VehiclesSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(KnowledgesSeeder::class);
        $this->call(HierarchiesSeeder::class);
        $this->call(ContractTypesSeeder::class);
        $this->call(SubknowledgesSeeder::class);
        $this->call(OcuppationAreasSeeder::class);
        
    }
}
