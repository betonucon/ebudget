<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mvariable extends Model
{
    protected $table = 'm_variable';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
