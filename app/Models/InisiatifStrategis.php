<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InisiatifStrategis extends Model
{
    use HasFactory;

    protected $fillable = [
        'inisiatif_desc',
        'tahun_inisiatif'
    ];

    public function kpi_pms(){
        return $this->hasMany('App\Models\KpiPms');
    }
}
