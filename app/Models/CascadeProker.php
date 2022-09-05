<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CascadeProker extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function CascadeKpi(){
        return $this->belongsTo('App\Models\CascadeKpi');
    }

    public function CascadeRealisasi(){
        return $this->hasMany('App\Models\CascadeRealisasi');
    }
}
