<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHasAttribute extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'attribute_option_id',
    ];

    public function option()
    {
        return $this->hasOne(AttributeOption::class, 'id', 'attribute_option_id');
    }
}
