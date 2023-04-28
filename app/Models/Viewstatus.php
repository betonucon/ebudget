<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewstatus extends Model
{
    protected $table = 'view_status';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
