<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehamilan extends Model
{
    protected $table = 'kehamilan';
    protected $fillable = [
        'rekam_medis_id',
        'usia_kehamilan',
        'tfu',
        'djj',
        'posisi_janin'
    ];
    public function rekamMedis(){
        return $this->belongsTo(RekamMedis::class);
    }
}
