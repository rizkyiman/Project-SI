<?php

namespace App\Http\Controllers;

use App\Models\ekspor;
use App\Models\Petikemas;
use Illuminate\Http\Request;

class EksportController extends Controller
{
    function index(){
        $ekspor = ekspor :: all();
        $petikemas = Petikemas :: all();
        $array = [
            'eksport' => $ekspor,
            'petikemas' => $petikemas
        ];
        return view('eksport',$array);
    }
    function store(Request $request){
        $ekspor = new ekspor();
        $ekspor = ekspor::create([
            'id_petikemas' => $request->role,
        ]);
        $ekspor->save();
        return redirect()->route('eksport');
    }
    public function update(Request $request,$id){
        $data = ekspor::FindOrFail($id);
        $data->id_petikemas=$request->input('role');
        $data->save();
        return redirect()->route('eksport');
    }
    public function delete($id)
    {
        ekspor::find($id)->delete();
        return redirect()->route('eksport');
    }
}
