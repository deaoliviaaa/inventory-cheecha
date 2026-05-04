<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'item_name',
        'store_name',
        'purchase_date',
        'quantity',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'purchase_date' => 'date',
        ];
    }
}