<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('admin/destinations/index', compact('destinations'));
    }

    public function create()
    {
        return view('admin/destinations/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $service = Destination::create($request->all());
        if($service) {
            Session::flash("success", "Destination has been created.");
        } else {
            Session::flash("error", "Destination created failed.");
        }
        return redirect()->to('admin/destinations');
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validation->fails()) {
            Session::flash("error", $validation->errors()->all());
            return redirect()->to('admin/destinations/edit/' . $id);
        } else {
            if(Destination::findOrFail($id)->update($request->all())) {
                Session::flash("success", "Destination has been updated.");
            } else {
                Session::flash("error", "Destination update failed.");
            }
            return redirect()->to('admin/destinations');
        }
    }

    public function destroy(Request $request)
    {
        if (Destination::destroy($request->id)) {
            Session::flash("success", "Destination has been deleted.");
        } else {
            Session::flash("error", "Destination deletion failed.");
        }
        return redirect()->to('admin/destinations');
    }
}
