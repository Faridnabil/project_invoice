<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Invoice extends Model
{
    use HasFactory, HasRoles;
    protected $table = "invoice";
    protected $primaryKey = "id";
    protected $fillable = [
        'no_inv', 'quotation_id', 'status', 'termin1', 'termin2', 'issue_date', 'due_date'
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
