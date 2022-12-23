<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_sub_total',
        'product_total',
        'product_price_vat',
        'product_vat',
        'product_currency_symbol'
    ];

    public function getformattedProductPriceAttribute()
    {
        return $this->product_currency_symbol . number_format($this->product_price, 2);
    }

    public function getFormattedProductSubTotalAttribute()
    {
        return $this->product_currency_symbol . number_format($this->product_sub_total, 2);
    }

    public function getFormattedProductTotalAttribute()
    {
        return $this->product_currency_symbol . number_format($this->product_total, 2);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
