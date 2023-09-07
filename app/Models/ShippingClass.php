<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ShippingClass extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        "title",
        "description",
        "condition",
        "cost",
    ];

    protected $translatable = [
        "title",
        "description"
    ];
    
}
