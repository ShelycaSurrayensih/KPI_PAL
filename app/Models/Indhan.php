<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indhan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'indhan';
    protected $fillable = [
        'id_indhan',
        'id_tim',
        'id_divisi',
        'program_strategis',
        'entitas',
        'program_utama',
        'target',
    ];
    public function indhanTim(){
        return $this->belongsTo('App\Models\IndhanTim');
    }
    public function divisi(){
        return $this->belongsTo('App\Models\Divisi');
    }
    public function indhanRealisasi(){
        return $this->hasMany('App\Models\IndhanRealisasi');
    }
}