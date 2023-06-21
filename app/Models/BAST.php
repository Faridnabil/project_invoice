<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BAST extends Model
{
    use HasFactory;
    protected $table = "bast";
    protected $primaryKey = "id";
    protected $fillable = [
        'no','no_spk','no_inv', 'tgl', 'nama', 'alamat', 'telp', 'ktp', 'nama1', 'alamat1', 'telp1', 'ktp1',
    ];
}
