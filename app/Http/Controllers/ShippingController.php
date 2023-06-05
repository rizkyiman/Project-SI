<?php

namespace App\Http\Controllers;

use App\Models\ekspor;
use App\Models\kapal;
use App\Models\Pergudangan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ShippingController extends Controller
{
    function index(){
        $shipping = kapal :: all();
        $pergudangan = Pergudangan :: all();
        $array = [
            'shipping' => $shipping,
            'pergudangan' => $pergudangan,
        ];
        return view('shipping',$array);
    }
    function store(Request $request){
        $shipping = new kapal();
        $shipping = kapal::create([
            'nama_kapal' => $request->nama_kapal,
            'tujuan' => $request->tujuan,
            'gudang_id' => $request->gudang_id,
        ]);
        $shipping->save();
        return redirect()->route('shipping');
    }
    function update(Request $request,$id){   
        $data = kapal::FindOrFail($id);
        $data->nama_kapal=$request->input('nama_kapal');
        $data->tujuan=$request->input('tujuan');
        $data->save();
        return redirect()->route('shipping');
    }
    public function delete($id)
    {
        kapal::find($id)->delete();
        return redirect()->route('shipping');
    }
    public function print(){
        $datas = kapal::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Shipping</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>ID Kapal</th>
                <th>Nama Kapal</th>
                <th>Tujuan</th>
                <th>ID Eksport</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->id . "</td>
            <td>" . $data->nama_kapal . "</td>
            <td>" . $data->tujuan . "</td>
            <td>" . $data->gudang_id . "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Recent.pdf');
    }
}
