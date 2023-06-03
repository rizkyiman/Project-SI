<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kapal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_kapal',
        'tujuan',
        'gudang_id'
    ];
}
