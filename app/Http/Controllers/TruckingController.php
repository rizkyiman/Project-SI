<?php

namespace App\Http\Controllers;

use App\Models\impor;
use App\Models\Pergudangan;
use App\Models\trucking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TruckingController extends Controller
{
    function index(){
        $trucking = trucking :: all();
        $pergudangan = Pergudangan :: all();
        $array = [
            'trucking' => $trucking,
            'pergudangan' => $pergudangan,
        ];
        return view('trucking',$array);
    }
    function store(Request $request){
        $trucking = new trucking();
        $trucking = trucking::create([
            'nama_sopir' => $request->nama_sopir,
            'nopol' => $request->nopol,
            'tujuan' => $request->tujuan,
            'keberangkatan' => $request->keberangkatan,
            'gudang_id' => $request->gudang_id,
        ]);
        $trucking->save();
        return redirect()->route('trucking');
    }
    public function update(Request $request,$id){   
        $data = trucking::FindOrFail($id);
        $data->nama_sopir=$request->input('nama_sopir');
        $data->nopol=$request->input('nopol');
        $data->tujuan=$request->input('tujuan');
        $data->keberangkatan=$request->input('keberangkatan');
        $data->save();
        return redirect()->route('trucking');
    }
    public function delete($id)
    {
        trucking::find($id)->delete();
        return redirect()->route('trucking');
    }
    public function print()
    {
        $datas = trucking::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Report Trucking</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>ID Truck</th>
                <th>Nama Sopir</th>
                <th>No Polisi</th>
                <th>Tujuan</th>
                <th>Tanggal</th>
                <th>ID Import</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->id . "</td>
            <td>" . $data->nama_sopir . "</td>
            <td>" . $data->nopol . "</td>
            <td>" . $data->tujuan . "</td>
            <td>" . $data->keberangkatan . "</td>
            <td>" . $data->gudang_id . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Recent.pdf');
    }
}
