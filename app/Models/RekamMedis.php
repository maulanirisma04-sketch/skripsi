<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $fillable = [
        'kunjungan_id',
        'tekanan_darah',
        'suhu',
        'berat_badan',
        'diagnosis',
        'catatan'
    ];
    public function kunjungan(){
        return $this->hasOne(\App\Models\Kunjungan::class);
    }
    public function kehamilan(){
        return $this->hasOne(Kehamilan::class);
    }
    public function persalinan(){
        return $this->hasOne(Persalinan::class);
    }
    public function kb(){
        return $this->hasOne(Kb::class);
    }
    public function imunisasi(){
        return $this->hasOne(Imunisasi::class);
    }
}
