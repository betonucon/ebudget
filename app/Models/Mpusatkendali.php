<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpusatkendali extends Model
{
    protected $table = 'm_pusat_kendali';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
