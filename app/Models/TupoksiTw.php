<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TupoksiTw extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'tupoksi_tw';
    protected $primaryKey = 'id_tw';
    protected $fillable = [
        'id_proker',
        'tw',
        'deskripsi',
    ];
    public function tupoksiProker(){
        return $this->hasMany('App\Models\TupoksiProker');
    }
}
