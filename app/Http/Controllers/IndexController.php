<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        //$file = file_get_contents(resource_path("assets/json/cities_withZones.json"));
        //$json = json_decode($file, true);
        return view("index");
        //return dd($json);
    }

    public function test()
    {
        $file = file_get_contents(resource_path("assets/json/zones.json"));
        $json = json_decode($file, true);
        return dd($json);
    }
}
