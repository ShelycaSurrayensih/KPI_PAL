<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndivKpiDir extends Model
{
    use HasFactory;
    
    public $table = 'indiv_kpidir';
    protected $primaryKey = 'id_kpidir';
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
        
    ];
    public function getCreatedAtAttribute()
{
    return \Carbon\Carbon::parse($this->attributes['created_at'])
       ->format('d, M Y');
}
    public function divisi(){
        return $this->belongsTo('App\Models\Divisi');
    }

    public function indivRealisasi(){
        return $this->hasMany('App\Models\indivRealisasi');
    }
}