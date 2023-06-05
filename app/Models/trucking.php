<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trucking extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'nama_sopir',
        'nopol',
        'tujuan',
        'keberangkatan',
        'gudang_id',
    ];
    public function gudang(){
        return $this->belongsTo(Pergudangan::class,'gudang_id');
    }
}
