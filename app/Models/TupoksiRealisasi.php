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
        'id_proker',
        'tw',
        'progres',
    ];
    public function tupoksiProker(){
        return $this->hasMany('App\Models\TupoksiProker');
    }
}