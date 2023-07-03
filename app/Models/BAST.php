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
        'no_bast','invoice_id', "spk_id", "file",
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }

    public function spk()
    {
        return $this->belongsTo('App\Models\SPK');
    }
}
