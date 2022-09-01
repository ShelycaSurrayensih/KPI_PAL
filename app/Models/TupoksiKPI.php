<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TupoksiKPI extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'tupoksi_kpi';
    protected $primaryKey = 'id_kpi';
    protected $fillable = [
        'id_kpi',
        'id_departemen',
        'kpi',
    ];
    public function TupokdiDepartemen(){
        return $this->belongsTo('App\Models\TupoksiDepartemen');
    }
    public function TupoksiProker(){
        return $this->belongsTo('App\Models\TupoksiProker');
    }
}
