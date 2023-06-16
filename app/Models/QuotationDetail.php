<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class QuotationDetail extends Model
{
    use HasFactory, HasRoles;
    protected $table = "quotation";
    protected $primaryKey = "id";
    protected $fillable = [
        'quotation_id', 'item_code', 'item_name',
        'qty', 'price', 'sub_total'
    ];

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }
}
