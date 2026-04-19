<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kb extends Model
{
    protected $table = 'kb';

    protected $fillable = [
        'rekam_medis_id',
        'jenis_kb',
        'efek_samping',
        'jadwal_berikutnya'
    ];

    public function rekamMedis(){
        return $this->belongsTo(RekamMedis::class);
    }
}
