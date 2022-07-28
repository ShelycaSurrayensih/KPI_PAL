<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndivPlan extends Model
{
    use HasFactory;
    public $table = 'indiv_plan';
    protected $fillable = [
        'id_plan',
        'tw',
        'prognosa',
        'id_divisi',
    ];
}