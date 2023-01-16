<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tusulan extends Model
{
    protected $table = 't_usulan';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    function musulan(){
        return $this->belongsTo('App\Models\Musulan','m_usulan_id','id');
    }
    
}
