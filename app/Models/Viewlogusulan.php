<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewlogusulan extends Model
{
    protected $table = 'view_log';
    public $timestamps = false;
    protected $guarded = ['id'];
    
    function musulan(){
        return $this->belongsTo('App\Models\Musulan','m_usulan_id','id');
    }
    
}
