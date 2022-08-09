<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiPms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_kat',
        'id_inisiatif',
        'sub_kat',
        'kpi_desc',
        'polaritas',
        'bobot',
        'target',
        'div_lead',
        'staging',
        'tahun'
    ];

    public function inisiatifStrategis(){
        return $this->belongsTo('App\Models\InisiatifStrategis');
    }
    public function kategori_pms(){
        return $this->belongsTo('App\Models\KategoriPms');
    }
    public function divisi(){
        return $this->belongsTo('App\Models\Divisi');
    }
}
