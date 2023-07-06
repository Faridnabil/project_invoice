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
        'no_quotation', 'customer_name', 'address', 'no_hp', 'no_ktp',
        'tax', 'sub_total', 'tax_amount', 'amount', 'amount_due', 'description',
        'nama_project', 'tanggal_quotation', 'perjanjian',
    ];

    public function quotation_detail()
    {
        return $this->hasMany('App\Models\QuotationDetail');
    }

    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    public function spk()
    {
        return $this->hasMany('App\Models\SPK');
    }
}
