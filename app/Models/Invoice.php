<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_email',
        'sub_total',
        'total',
        'total_vat'
    ];

    public function getFormattedSubTotalAttribute()
    {
        return $this->currency_symbol . number_format($this->sub_total, 2);
    }

    public function getFormattedTotalAttribute()
    {
        return $this->currency_symbol . number_format($this->total, 2);
    }

    public function getFormattedTotalVatAttribute()
    {
        return $this->currency_symbol . number_format($this->total_vat, 2);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
