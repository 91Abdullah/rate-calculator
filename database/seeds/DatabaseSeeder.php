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
        // $this->call(UsersTableSeeder::class);
        $this->call(ZonesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(DestinationTableSeeder::class);
        $this->call(RatesTableSeeder::class);
    }
}
