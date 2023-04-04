<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $table = 'example';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
