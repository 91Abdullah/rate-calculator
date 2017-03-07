<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("services")->insert([
            'name' => "Overnight",
            'description' => "."
        ]);
        DB::table("services")->insert([
            'name' => "MyFlyer",
            'description' => "."
        ]);
        DB::table("services")->insert([
            'name' => "Same day",
            'description' => "."
        ]);
        DB::table("services")->insert([
            'name' => "MyBox",
            'description' => "."
        ]);
        DB::table("services")->insert([
            'name' => "AirCargo",
            'description' => "."
        ]);
    }
}
