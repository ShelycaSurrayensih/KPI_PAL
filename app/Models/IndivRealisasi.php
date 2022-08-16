<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndivRealisasi extends Model
{
    use HasFactory;
    public $table = 'indiv_realisasi';
    protected $primaryKey = 'id_realisasi';
    public $timestamps = false;
    protected $fillable = [
        'id_plan',
        'id_kpidir',
        'tw',
        'progres',
        'realisasi',
        'prognosa',
        'keterangan',
        'id_divisi',
    ];
    public function indivKpiDir(){
        return $this->belongsTo('App\Models\indivKpiDir');
    }
}