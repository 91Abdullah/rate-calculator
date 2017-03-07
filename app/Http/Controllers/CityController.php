<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::paginate(20);
        return view('admin/cities/index', compact('cities'));
    }

    public function create()
    {
        return view('admin/cities/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $zone = City::create($request->all());
        if($zone) {
            Session::flash("success", "Zone has been created.");
        } else {
            Session::flash("error", "Zone created failed.");
        }
        return redirect()->to('admin/cities');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validation->fails()) {
            Session::flash("error", $validation->errors()->all());
            return redirect()->to('admin/cities/edit/' . $id);
        } else {
            if(Zone::findOrFail($id)->update($request->all())) {
                Session::flash("success", "City has been updated.");
            } else {
                Session::flash("error", "City update failed.");
            }
            return redirect()->to('admin/cities');
        }
    }

    public function destroy(Request $request)
    {
        if (City::destroy($request->id)) {
            Session::flash("success", "Zone has been deleted.");
        } else {
            Session::flash("error", "Zone deletion failed.");
        }
        return redirect()->to('admin/cities');
    }
}
