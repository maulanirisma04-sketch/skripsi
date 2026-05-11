<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ObatController; 

class Obat extends Model
{
    protected $fillable = [
    'nama_obat',
    'satuan',
    'stok'
    ];
}
