<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon;
class IndhanRealisasi extends Model
{
    use HasFactory;
    public $table = 'indhan_realisasi';
    protected $primaryKey = 'id_realisasi';
    protected $fillable = [
        'id_realisasi',
        'id_indhan',
        'realisasi',
        'bulan',
        'tahun',
        'kendala',
        
    ];
    public function getCreatedAtAttribute()
{
    return \Carbon\Carbon::parse($this->attributes['created_at'])
       ->format('d, M Y');
}
    public function indhan(){
        return $this->belongsTo('App\Models\Indhan');
        //return $this->belongsTo(Indhan::class, "requestor_id");
    }
}