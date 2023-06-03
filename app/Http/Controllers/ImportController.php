<?php

namespace App\Http\Controllers;

use App\Models\impor;
use App\Models\Petikemas;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    function index(){
        $import = impor :: all();
        $petikemas = Petikemas :: all();
        $array = [
            'import' => $import,
            'petikemas' => $petikemas,
        ];
        return view('import',$array);
    }
    function store(Request $request){
        $import = new impor();
        $import = impor::create([
            'id_petikemas' => $request->role,
        ]);
        $import->save();
        return redirect()->route('import');
    }
    public function update(Request $request, $id){
        
        $data = impor::FindOrFail($id);
        $data->id_petikemas = $request->input('role');
        $data->save();
        return redirect()->route('import');
    }
    public function delete($id)
    {
        impor::find($id)->delete();
        return redirect()->route('import');
    }
}
