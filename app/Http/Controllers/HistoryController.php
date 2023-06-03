<?php

namespace App\Http\Controllers;

use App\Models\kapal;
use App\Models\riwayat;
use App\Models\trucking;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class HistoryController extends Controller
{
    function index(){
        $history = riwayat :: all();
        $trucking = trucking :: all();
        $shipping = kapal :: all();
        $user = User :: all();
        $array = [
            'history' => $history,
            'trucking' => $trucking,
            'shipping' => $shipping,
            'user' => $user,
        ];
        return view('history',$array);
    }
    function store(Request $request){
        $history = new riwayat();
        $history = riwayat::create([
            'tanggal' => $request->date,
            'kapal_id' => $request->id_ekspor,
            'trucking_id' => $request->id_impor,
            'user_id' => $request->id_user,
        ]);
        $history->save();
        return redirect()->route('history');
    }
    public function update(Request $request,$id){   
        $data = riwayat::FindOrFail($id);
        $data->tanggal=$request->input('date');
        $data->save();
        return redirect()->route('history');
    }
    public function delete($id)
    {
        riwayat::find($id)->delete();
        return redirect()->route('history');
    }
    public function print(){
        $datas = riwayat::all();
        $pdf = App::make('dompdf.wrapper');
        $html = '<center><h3>Riwayat Transaksi</h3></center><hr/><br>';
        $html .= '<table border=1 width="100%">
			<tr style="border: 1px solid #000; padding: 8px;">
                <th>No</th>
                <th>Tanggal</th>
                <th>ID Shipping</th>
                <th>ID Trucking</th>
                <th>User</th>
                <th>ID User</th>
			</tr>';
        $no = 1;
        foreach ($datas as $data) {
            $html .= "<tr style='text-align: center'>
            <td>" . $no++ . "</td>
            <td>" . $data->tanggal . "</td>
            <td>" . $data->kapal_id . "</td>
            <td>" . $data->trucking_id . "</td>
            <td>" . $data->user->name . "</td>
            <td>" . $data->user->id. "</td>
            </tr>";
        }
        $html .= "</html>";
        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'landscape');
        return $pdf->stream('Recent.pdf');
    }
}
