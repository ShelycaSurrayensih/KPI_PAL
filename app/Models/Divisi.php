<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    public $table = 'divisi';
    protected $fillable = [
        'id_divisi',
        'div_name',
        'username',
        'id_direktorat',
    ];

    public function direktorat(){
        return $this->belongsTo('App\Models\Direktorat');
    }
}
