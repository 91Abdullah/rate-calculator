<?php

namespace App\Http\Controllers;

use App\LimitType;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin/types/index', compact('types'));
    }

    public function create()
    {
        return view('admin/types/create');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'weight_limit' => 'required|numeric'
        ]);

        if ($validation->fails()) {
            Session::flash("error", $validation->errors()->all());
            return redirect()->to('admin/types/create');
        } else {
            $type = Type::create($request->all());
            if($type) {
                Session::flash("success", "Weight limit has been specified.");
            } else {
                Session::flash("error", "Weight limit creation failed.");
            }
            return redirect()->to('admin/types');
        }
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'weight_limit' => 'required|numeric'
        ]);

        if ($validation->fails()) {
            Session::flash("error", $validation->errors()->all());
            return redirect()->to('admin/types/edit/' . $id);
        } else {
            if(Type::findOrFail($id)->update($request->all())) {
                Session::flash("success", "Weight limit has been updated.");
            } else {
                Session::flash("error", "Weight limit update failed.");
            }
            return redirect()->to('admin/types');
        }
    }

    public function destroy(Request $request)
    {
        if (Type::destroy($request->id)) {
            Session::flash("success", "Weight limit has been removed.");
        } else {
            Session::flash("error", "Weight limit deletion failed.");
        }
        return redirect()->to('admin/types');
    }
}
