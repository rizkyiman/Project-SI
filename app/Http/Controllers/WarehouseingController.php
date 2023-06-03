<?php

namespace App\Http\Controllers;

use App\Models\ekspor;
use App\Models\impor;
use App\Models\Pergudangan;
use Illuminate\Http\Request;

class WarehouseingController extends Controller
{
    function index(){
        $pergudangan = Pergudangan :: all();
        $ekspor = ekspor :: all();
        $impor = impor :: all();
        $array = [
            'warehousing' => $pergudangan,
            'ekspor' => $ekspor,
            'impor' => $impor,
        ];
        return view('warehouseing',$array);
    }
    function store(Request $request){
        $pergudangan = new Pergudangan();
        $pergudangan = Pergudangan::create([
            'row' => $request->row,
            'cell' => $request->cell,
            'waktu' => $request->waktu,
            'id_ekspor' => $request->id_ekspor,
            'id_impor' => $request->id_impor,
        ]);
        $pergudangan->save();
        return redirect()->route('warehouseing');
    }
    public function update(Request $request,$id){   
        $data = Pergudangan::FindOrFail($id);
        $data->row=$request->input('row');
        $data->cell=$request->input('cell');
        $data->waktu=$request->input('waktu');
        $data->save();
        return redirect()->route('warehouseing');
    }
    public function delete($id)
    {
        Pergudangan::find($id)->delete();
        return redirect()->route('warehouseing');
    }
}
