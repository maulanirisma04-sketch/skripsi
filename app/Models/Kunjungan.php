<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $fillable = [
        'pasien_id',
        'tanggal_kunjungan',
        'jenis_pemeriksaan'
    ];
    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }
    public function rekamMedis(){
        return $this->hasOne(\App\Models\RekamMedis::class);
    }
        
}
