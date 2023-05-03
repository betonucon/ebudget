<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mrole extends Model
{
    protected $table = 'm_role';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
