<?php

namespace App\Http\Controllers;

use App\City;
use App\Destination;
use App\LimitType;
use App\Rate;
use App\Service;
use App\Type;
use App\Zone;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getRates(Request $request)
    {
        $response = [];
        $to_city = City::where("name", $request->to_city)->first();
        $from_city = City::where("name", $request->from_city)->first();
        if($to_city || $from_city)  {
            if($to_city == $from_city) {
                // Within City
                $destination = Destination::where("name", "Within City")->first();
            } elseif ($to_city->zone == $from_city->zone) {
                //Same Zone
                $destination = Destination::where("name", "Same Zone")->first();
            } else {
                $destination = Destination::where("name", "Different Zone")->first();
            }


            if((float)$request->weight == 0.5) {
                $rates = Rate::with('service')->where("destination_id", $destination->id)->where("upto", (float)$request->weight)->get();
                foreach ($rates as $key => $rate) {
                    $response[$key]["service_name"] = $rate->service->name;
                    $response[$key]["rate"] = $rate->rate;
                }
            } elseif((float)$request->weight == 1) {
                $rates = Rate::with('service')->where("destination_id", $destination->id)->where("upto", (float)$request->weight)->get();
                foreach ($rates as $key => $rate) {
                    $response[$key]["service_name"] = $rate->service->name;
                    $response[$key]["rate"] = $rate->rate;
                }
            } else {
                $rates = Rate::with('service')->where("destination_id", $destination->id)->where("upto", "!=", 0.5)->get();
                foreach ($rates as $key => $rate) {
                    $response[$key]["service_name"] = $rate->service->name;
                    $response[$key]["rate"] = $rate->rate + (((float)$request->weight-$rate->upto)/$rate->additional_weight)*$rate->additional_rate;
                }
            }


            return response()->json($response, 200);

        } else {
            return response()->json("Invalid city or city not in service.", 200);
        }
    }
}
