<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musulan extends Model
{
    protected $table = 'm_usulan';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
