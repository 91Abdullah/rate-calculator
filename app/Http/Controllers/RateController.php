<?php

namespace App\Http\Controllers;

use App\Destination;
use App\Rate;
use App\Service;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::all();
        return view('admin/rates/index', compact('rates'));
    }

    public function create()
    {
        $services = Service::pluck('name', 'id');
        $destinations = Destination::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        return view('admin.rates.create', compact('services', 'destinations', 'types'));
        //return $destinations;
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'service_id' => 'required',
            'destination_id' => 'required',
            'upto' => 'required|numeric',
            'rate' => 'required|numeric',
            'additional_rate' => 'required|numeric',
            'additional_weight' => 'required|numeric',
        ]);
        if ($validation->fails()) {
            Session::flash("error", $validation->errors()->all());
            return redirect()->to('admin/rates/create');
        } else {
            $rate = Rate::create($request->all());
            if($rate) {
                Session::flash("success", "Rate has been created.");
            } else {
                Session::flash("error", "Rate creation failed.");
            }
            return redirect()->to('admin/rates');
        }
    }

    public function edit($id)
    {
        $rate = Rate::findOrFail($id);
        $services = Service::pluck('name', 'id');
        $destinations = Destination::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        return view('admin.rates.edit', compact('rate', 'services', 'destinations', 'types'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'service_id' => 'required',
            'destination_id' => 'required',
            'upto' => 'required|numeric',
            'rate' => 'required|numeric',
            'additional_rate' => 'required|numeric',
            'additional_weight' => 'required|numeric'
        ]);

        if ($validation->fails()) {
            Session::flash("error", $validation->errors()->all());
            return redirect()->to('admin/rates/edit/' . $id);
        } else {
            if(Rate::findOrFail($id)->update($request->all())) {
                Session::flash("success", "Rate has been updated.");
            } else {
                Session::flash("error", "Rate update failed.");
            }
            return redirect()->to('admin/rates');
        }
    }

    public function destroy(Request $request)
    {
        if (Rate::destroy($request->id)) {
            Session::flash("success", "Type has been deleted.");
        } else {
            Session::flash("error", "Type deletion failed.");
        }
        return redirect()->to('admin/rates');
    }
}
