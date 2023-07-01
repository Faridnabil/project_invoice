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
        'no_bast','invoice_id',
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
