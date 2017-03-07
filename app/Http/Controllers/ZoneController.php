<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::all();
        return view('admin/zones/index', compact('zones'));
    }

    public function create()
    {
        return view('admin/zones/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $zone = Zone::create($request->all());
        if($zone) {
            Session::flash("success", "Zone has been created.");
        } else {
            Session::flash("error", "Zone created failed.");
        }
        return redirect()->to('admin/zones');
    }

    public function edit($id)
    {
        $zone = Zone::findOrFail($id);
        return view('admin.zones.edit', compact('zone'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validation->fails()) {
            Session::flash("error", $validation->errors()->all());
            return redirect()->to('admin/zones/edit/' . $id);
        } else {
            if(Zone::findOrFail($id)->update($request->all())) {
                Session::flash("success", "Zone has been updated.");
            } else {
                Session::flash("error", "Zone update failed.");
            }
            return redirect()->to('admin/zones');
        }
    }

    public function destroy(Request $request)
    {
        if (Zone::destroy($request->id)) {
            Session::flash("success", "Zone has been deleted.");
        } else {
            Session::flash("error", "Zone deletion failed.");
        }
        return redirect()->to('admin/zones');
    }
}
