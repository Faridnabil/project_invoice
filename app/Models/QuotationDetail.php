<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class QuotationDetail extends Model
{
    use HasFactory, HasRoles;
    protected $table = "quotation_detail";
    protected $primaryKey = "id";
    protected $fillable = [
        'quotation_id', 'item_code', 'item_name',
        'qty', 'satuan', 'price', 'total'
    ];

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
