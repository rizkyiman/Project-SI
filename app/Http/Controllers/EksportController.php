<?php

namespace App\Http\Controllers;

use App\Models\ekspor;
use App\Models\Petikemas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
    public function print(){
        $datas = ekspor::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Eksport Report</h3></center><hr/><br>';
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
