<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TupoksiDepartemen extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'tupoksi_departemen';
    protected $primaryKey = 'id_departemen';
    protected $fillable = [
        'id_departemen',
        'departemen',
    ];
    public function TupoksiKPI(){
        return $this->hasMany('App\Models\TupoksiKPI');
    }
}
