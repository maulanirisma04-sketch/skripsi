<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    protected $table = 'imunisasi';
    protected $fillable = [
    'rekam_medis_id',
    'jenis_imunisasi',
    'jadwal_berikutnya'
    ];
    public function rekamMedis(){
        return $this->belongsTo(RekamMedis::class);
    }
}
