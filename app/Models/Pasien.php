<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 

class Pasien extends Model
{
    protected $fillable = [
    'nama',
    'NIK',
    'tanggal_lahir',
    'alamat',
    'no_telp'
    ];
    public function kunjungans(){
        return $this->hasMany(\App\Models\Kunjungan::class); 
    }
}

