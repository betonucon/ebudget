<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mtujuan extends Model
{
    protected $table = 'm_tujuan';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
