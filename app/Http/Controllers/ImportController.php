<?php

namespace App\Http\Controllers;

use App\Models\impor;
use App\Models\Petikemas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
    public function print(){
        $datas = impor::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Import Report</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>ID Petikemas</th>
                <th>Muatan</th>
                <th>Golongan</th>
                <th>Warna</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->id . "</td>
            <td>" . $data->petikemas->muatan . "</td>
            <td>" . $data->petikemas->golongan . "</td>
            <td>" . $data->petikemas->warna . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Recent.pdf');
    }
}
