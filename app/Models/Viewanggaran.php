<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewanggaran extends Model
{
    protected $table = 'view_anggaran';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    // function memploye(){
    //     return $this->belongsTo('App\Models\Employe','nik','nik');
    // }
    
}
