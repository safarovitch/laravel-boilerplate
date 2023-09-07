<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductVariationOptionValue extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'sku',
        'stock',
        'ean',
        'price',
        'discount_price',
        'width',
        'length',
        'height',
        'weight',
        'product_variation_id'
    ];

    protected $casts = [
        'price' => 'array',
        'discount_price' => 'array'
    ];

    /**
     * Get category images
     */
    /**
     * Get product Images
     */
    public function gallery()
    {
        return $this->getMedia('gallery');
    }

    /**
     * Get product featured image
     * */
    public function featuredImage()
    {
        return $this->getFirstMediaUrl('featured_image');
    }

    public function getPriceAttribute()
    {
        return $this->discount_price ? $this->discount_price : $this->attributes['price'];
    }

    public function getPrice($code = null)
    {
        return isset($code) ? (json_decode($this->attributes['price'],true)->$code ??  json_decode($this->attributes['price'],true)[$code] ?? "") : json_decode($this->attributes['price'],true);
    }

    // public function optionValueForGrouppedItem()
    // {
    //     return $this->hasOne(ProductGroupVariationOptionValue::class, 'product_variation_option_value_id', 'id');
    // }
}
