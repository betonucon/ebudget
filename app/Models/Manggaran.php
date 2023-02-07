<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manggaran extends Model
{
    protected $table = 'm_anggaran';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
