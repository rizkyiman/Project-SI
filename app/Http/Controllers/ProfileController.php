<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index(){
        $profile = User :: all();
        $role = Role::all();
        $array = [
            'profile' => $profile,
            'role' => $role,
        ];
        return view('profile',$array);
    }
    function store(Request $request){
        $profile = new User();
        $profile = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'company' => $request->company,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ]);
        $profile->save();
        return redirect()->route('profile');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('eksport');
    }
}
