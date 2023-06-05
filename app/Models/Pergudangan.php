<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergudangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'row',
        'cell',
        'waktu',
        'id_ekspor',
        'id_impor',
    ];
    public function kapal(){
        return $this->hasMany(kapal::class,'id');
    }
    public function trucking(){
        return $this->hasMany(trucking::class,'id');
    }
}
