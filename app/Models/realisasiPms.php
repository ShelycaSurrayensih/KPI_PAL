<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class realisasiPms extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $primaryKey = 'id_real';
    protected $fillable = [
        'id_plan',
        'progres_real',
        'desc_real',
        'kendala',
    ];

    public function plan_pms(){
        return $this->belongsTo('App\Models\planPms');
    }
}