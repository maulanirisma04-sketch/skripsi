<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persalinan extends Model
{
    protected $table = 'persalinan';
    protected $fillable = [
    'rekam_medis_id',
    'berat_bayi',
    'tinggi_bayi',
    'apgar',
    'jenis_persalinan',
    'anestesi'
    ];
    public function rekamMedis(){
        return $this->belongsTo(RekamMedis::class);
    }
}
