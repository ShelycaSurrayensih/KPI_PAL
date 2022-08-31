<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CascadeKat extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function CascadeKpi(){
        return $this->hasMany('App\Models\CascadeKpi');
    }
}
