<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TupoksiRealisasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'tupoksi_realisasi';
    protected $primaryKey = 'id_realisasi';
    protected $fillable = [
        'id_realisasi',
        'id_tw',
        'progres',
        'deskripsi',
    ];
    public function tupoksiTw(){
        return $this->hasMany('App\Models\TupoksiTw');
    }
}