<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    protected $table = 'imunisasi';
    protected $fillable = [
    'rekam_medis_id',
    'kunjungan_id',
    'jenis_imunisasi',
    'jadwal_berikutnya',
    'status'
    ];
    public function rekamMedis(){
        return $this->belongsTo(RekamMedis::class);
    }
    public function kunjungan(){
        return $this->belongsTo(Kunjungan::class);
    }
}
