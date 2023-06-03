<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function index(){
        $role = Role :: all();
        $array = [
            'role' => $role,
        ];
        return view('role',$array);
    }
    function store(Request $request){
        $role = new Role();
        $role = Role::create([
            'role' => $request->role,
        ]);
        $role->save();
        return redirect()->route('role');
    }
    public function update(Request $request){
        $data = Role::FindOrFail($request->id);
        $data->role=$request->input('role');
        $data->save();
        return redirect()->route('role');
    }
    public function delete($id)
    {
        Role::find($id)->delete();
        return redirect()->route('role');
    }
}
