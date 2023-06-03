<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petikemas extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_perusaahan',
        'muatan',
        'golongan',
        'warna',
        'berat_muatan',
        'user_id'
    ];
}
