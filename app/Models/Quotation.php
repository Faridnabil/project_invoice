<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Quotation extends Model
{
    use HasFactory, HasRoles;
    protected $table = "quotation";
    protected $primaryKey = "id";
    protected $fillable = [
        'no_quotation', 'customer_name', 'address', 'tax', 'sub_total',
        'tax_amount', 'amount', 'amount_paid', 'amount_due', 'description'
    ];

    public function quotation_detail()
    {
        return $this->hasMany('App\Models\QuotationDetail');
    }

}
