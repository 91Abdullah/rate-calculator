<?php

namespace App\Http\Controllers;

use App\Destination;
use App\Service;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin/services/index', compact('services'));
    }

    public function create()
    {
        $destinations = Destination::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        return view('admin/services/create', compact('destinations', 'types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'string'
        ]);

        $service = Service::create($request->all());
        if($service) {
            Session::flash("success", "Service has been created.");
        } else {
            Session::flash("error", "Service created failed.");
        }
        return redirect()->to('admin/services');
    }

    public function edit($id)
    {
        $destinations = Destination::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service', 'destinations', 'types'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'string'
        ]);

        if ($validation->fails()) {
            Session::flash("error", $validation->errors()->all());
            return redirect()->to('admin/services/edit/' . $id);
        } else {
            if(Service::findOrFail($id)->update($request->all())) {
                Session::flash("success", "Service has been updated.");
            } else {
                Session::flash("error", "Service update failed.");
            }
            return redirect()->to('admin/services');
        }
    }

    public function destroy(Request $request)
    {
        if (Service::destroy($request->id)) {
            Session::flash("success", "Service has been deleted.");
        } else {
            Session::flash("error", "Service deletion failed.");
        }
        return redirect()->to('admin/services');
    }
}
