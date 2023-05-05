<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vemploye extends Model
{
    protected $table = 'view_employe';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
