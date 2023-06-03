<?php

namespace App\Http\Controllers;

use App\Models\Petikemas;
use App\Models\User;
use Illuminate\Http\Request;

class PetikemasController extends Controller
{
    function index(){
        $petikemas = Petikemas :: all();
        $profile = User :: all();
        $array = [
            'petikemas' => $petikemas,
            'profile' => $profile,
        ];
        return view('petikemas', $array);
    }
    function store(Request $request){
        $petikemas = new Petikemas([
            'muatan' => $request->muatan,
            'golongan' => $request->golongan,
            'warna' => $request->warna,
            'berat_muatan' => $request->berat_muatan,
            'user_id' => $request->role,
        ]);
       
        $petikemas->save();
        return redirect()->route('petikemas');
    }
    public function update(Request $request){
        $data = Petikemas::FindOrFail($request->id);
        $data->muatan=$request->input('muatan');
        $data->golongan=$request->input('golongan');
        $data->warna=$request->input('warna');
        $data->berat_muatan=$request->input('berat_muatan');
        $data->save();
        return redirect()->route('petikemas');
    }
    public function delete($id)
    {
        Petikemas::find($id)->delete();
        return redirect()->route('petikemas');
    }
}
