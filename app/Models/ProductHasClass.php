<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHasClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'class_id',
    ];
}
