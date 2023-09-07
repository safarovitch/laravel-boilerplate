<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_type',
        'requires_shipping',
        'name',
        'options',
        'unit_price',
        'unit',
        'quantity',
        'sub_total',
        'total',
        'SKU',
        'barcode',
        'tax_rate',
        'tax_total',
        'discount_total',
    ];


    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
