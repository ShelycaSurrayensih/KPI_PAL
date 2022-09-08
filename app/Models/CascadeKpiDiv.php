<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CascadeKpiDiv extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function CascadeKpi(){
        return $this->belongsTo('App\Models\CascadeKpi');
    }

    public function CascadeProker(){
        return $this->hasMany('App\Models\CascadeProker');
    }
}
