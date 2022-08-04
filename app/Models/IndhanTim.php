<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndhanTim extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'indhan_tim';
    protected $primaryKey = 'id_tim';
    protected $fillable = [
        'id_tim',
        'nama_tim',
    ];
    public function indhan(){
        return $this->hasMany('App\Models\Indhan');
    }
}