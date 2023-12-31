<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPK extends Model
{
    use HasFactory;
    protected $table = "spk";
    protected $primaryKey = "id";
    protected $fillable = [
        'no', 'tgl', 'nama', 'alamat', 'telp', 'ktp', 'quotation_id', 'file'
        // 'nama1', 'alamat1', 'telp1', 'ktp1',
    ];

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }

    public function bast()
    {
        return $this->hasMany('App\Models\BAST');
    }
}
