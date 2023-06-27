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
        'no_inv','no_quotation', 'status','pembayaran', 'issue_date', 'due_date'
    ];

    public function invoice_detail()
    {
        return $this->belongsTo('App\Models\Quotation');
    }

}
