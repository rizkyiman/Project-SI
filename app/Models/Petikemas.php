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
    public function import(){
        return $this->hasMany(impor::class,'id');
    }
    public function eksport(){
        return $this->hasMany(ekspor::class,'id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
