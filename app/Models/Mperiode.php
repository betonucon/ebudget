<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mperiode extends Model
{
    protected $table = 'm_periode';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
