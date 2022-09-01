<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TupoksiProker extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'tupoksi_proker';
    protected $primaryKey = 'id_proker';
    protected $fillable = [
        'id_proker',
        'id_kpi',
        'proker',
        'target',
    ];
    public function TupoksiKPI(){
        return $this->hasMany('App\Models\TupoksiKPI');
    }
}
