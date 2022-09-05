<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CascadeRealisasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    public function CascadeProker(){
        return $this->belongsTo('App\Models\CascadeProker');
    }
}
