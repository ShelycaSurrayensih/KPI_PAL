<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planPms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_kpipms',
        'tw',
        'progress_plan',
        'desc_progres',
    ];

    public function kpi_pms(){
        return $this->belongsTo('App\Models\KpiPms');
    }

    public function realisasi_pms(){
        return $this->hasMany('App\Models\realisasiPms');
    }
}
