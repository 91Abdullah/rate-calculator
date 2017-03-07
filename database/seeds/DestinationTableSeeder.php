<?php

use Illuminate\Database\Seeder;

class DestinationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table("destinations")->insert([
            "name" => "Within City"
        ]);
        Db::table("destinations")->insert([
            "name" => "Same Zone"
        ]);
        Db::table("destinations")->insert([
            "name" => "Different Zone"
        ]);
        Db::table("destinations")->insert([
            "name" => "City to City"
        ]);
    }
}
