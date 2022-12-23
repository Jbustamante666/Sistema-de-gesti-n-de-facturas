<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'currency_symbol',
        'vat'
    ];

    public function getformattedPriceAttribute()
    {
        return $this->currency_symbol . number_format($this->price, 2);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
