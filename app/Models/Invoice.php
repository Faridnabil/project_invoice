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
        'no_inv', 'quotation_detail_id','status', 'issue_date', 'due_date'
    ];

    public function invoice_detail()
    {
        return $this->hasMany('App\Models\QuotationDetail');
    }

}
