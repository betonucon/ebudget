<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mstatus extends Model
{
    protected $table = 'm_status';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
