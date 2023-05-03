<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vunit extends Model
{
    protected $table = 'view_unit';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
