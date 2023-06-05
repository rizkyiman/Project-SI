<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ekspor extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'id_petikemas'
    ];
    public function petikemas(){
        return $this->belongsTo(Petikemas::class,'id_petikemas');
    }
}
