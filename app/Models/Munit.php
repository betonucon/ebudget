<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Munit extends Model
{
    protected $table = 'm_unit';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
