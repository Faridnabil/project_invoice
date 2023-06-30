<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPK extends Model
{
    use HasFactory;
    protected $table = "SPK";
    protected $primaryKey = "id";
    protected $fillable = [
        'no', 'tgl', 'nama', 'alamat', 'telp', 'ktp', 'nama1', 'alamat1', 'telp1', 'ktp1', 'quotation_id',
    ];

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }
}
