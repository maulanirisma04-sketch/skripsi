<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $fillable = [
        'kunjungan_id',
        'diagnosis',
        'catatan'
    ];
    public function kunjungan(){
        return $this->belongsTo(\App\Models\Kunjungan::class);
    }
    public function kehamilan(){
        return $this->belongsTo(Kehamilan::class);
    }
    public function persalinan(){
        return $this->belongsTo(Persalinan::class);
    }
    public function kb(){
        return $this->belongsTo(Kb::class);
    }
    public function imunisasi(){
        return $this->belongsTo(Imunisasi::class);
    }
}
