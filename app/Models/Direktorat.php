<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direktorat extends Model
{
    use HasFactory;
    public $table = 'direktorat';
    protected $fillable = [
        'id_direktorat',
        'nama',
    ];
    
}