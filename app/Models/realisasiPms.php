<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class realisasiPms extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_plan',
        'progres_real',
        'desc_real',
        'kendala',
        'file',
    ];

    public function plan_pms(){
        return $this->belongsTo('App\Models\planPms');
    }
}
