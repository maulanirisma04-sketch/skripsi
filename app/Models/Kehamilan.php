<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehamilan extends Model
{
    protected $fillable = [
        'rekam_medis_id',
        'usia_kehamilan'
    ];
    public function rekamMedis(){
        return $this->belongsTo(RekamMedis::class);
    }
}
