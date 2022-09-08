<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CascadeProker extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function CascadeKpiDiv(){
        return $this->belongsTo('App\Models\CascadeKpiDiv');
    }

    public function CascadeRealisasi(){
        return $this->hasMany('App\Models\CascadeRealisasi');
    }
}
