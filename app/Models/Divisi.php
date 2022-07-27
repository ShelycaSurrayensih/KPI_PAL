<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_divisi',
        'div_name',
        'username',
        'password',
        'id_direktorat',
    ];

    public function direktorat(){
        return $this->belongsTo('App\Models\Direktorat');
    }
}
