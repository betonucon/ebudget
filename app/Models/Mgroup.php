<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mgroup extends Model
{
    protected $table = 'm_group';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
