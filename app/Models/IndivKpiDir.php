<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndivKpiDir extends Model
{
    use HasFactory;
    public $table = 'indiv_kpidir';
    protected $fillable = [
        'id_kpidir',
        'id_direktorat',
        'id_divisi',
        'desc_kpidir',
        'satuan',
        'target',
        'bobot',
        'ket',
        'asal_kpi',
        'alasan',
    ];
}