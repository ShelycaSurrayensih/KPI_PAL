<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CascadeKpi extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function CascadeKat(){
        return $this->belongsTo('App\Models\CascadeKat');
    }
}
