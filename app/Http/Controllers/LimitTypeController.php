<?php

namespace App\Http\Controllers;

use App\LimitType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LimitTypeController extends Controller
{
    public function index()
    {
        $limit_types = LimitType::all();
        return view('admin/limit_types/index', compact('limit_types'));
    }

    public function create()
    {
        return view('admin/limit_types/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $limit_types = LimitType::create($request->all());
        if($limit_types) {
            Session::flash("success", "Limit Type has been created.");
        } else {
            Session::flash("error", "Limit Type created failed.");
        }
        return redirect()->to('admin/limit_types');
    }

    public function edit($id)
    {
        $limit_type = LimitType::findOrFail($id);
        return view('admin.limit_types.edit', compact('limit_type'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validation->fails()) {
            Session::flash("error", $validation->errors()->all());
            return redirect()->to('admin/limit_types/edit/' . $id);
        } else {
            if(LimitType::findOrFail($id)->update($request->all())) {
                Session::flash("success", "Limit Type has been updated.");
            } else {
                Session::flash("error", "Limit Tyye update failed.");
            }
            return redirect()->to('admin/limit_types');
        }
    }

    public function destroy(Request $request)
    {
        if (LimitType::destroy($request->id)) {
            Session::flash("success", "Limit Tpye has been deleted.");
        } else {
            Session::flash("error", "Limit Tpye deletion failed.");
        }
        return redirect()->to('admin/limit_types');
    }
}
