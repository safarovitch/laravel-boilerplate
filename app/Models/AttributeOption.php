<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AttributeOption extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'attribute_id',
        'value',
    ];

    public $translatable = ['value'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
