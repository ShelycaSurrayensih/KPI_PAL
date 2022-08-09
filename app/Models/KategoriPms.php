<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPms extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'kat_desc',
        'ket'
    ];

    public function kpi_pms(){
        return $this->hasMany('App\Models\KpiPms');
    }
}
