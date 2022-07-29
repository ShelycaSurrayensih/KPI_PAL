<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndhanRealisasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'indhan_realisasi';
    protected $fillable = [
        'id_realisasi',
        'id_indhan',
        'realisasi',
        'bulan',
        'tahun',
        'kendala',
        'tgl_input',
    ];
    public function indhan(){
        return $this->belongsTo('App\Models\Indhan');
    }
}