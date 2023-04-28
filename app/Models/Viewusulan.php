<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewusulan extends Model
{
    protected $table = 'view_usulan';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
