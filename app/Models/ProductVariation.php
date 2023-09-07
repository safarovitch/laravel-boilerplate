<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'variation_option_id',
        'parent_id'
    ];

    // GROUP PRODUCT

    /**
     * Get variation options
     */
    public function options()
    {
        return $this->hasMany(ProductVariation::class, 'parent_id', 'id')->where('product_id', $this->product_id);
    }

    /**
     * Get variation parent
     */
    public function parent()
    {
        return $this->hasOne(ProductVariation::class, 'id',  'parent_id')->where('product_id', $this->product_id);
    }


    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }


    /**
     * Get variation relation
     */
    public function variation()
    {
        return $this->belongsTo(VariationOption::class, 'variation_option_id');
    }

    /**
     * Get variation name
     */
    public function getNameAttribute()
    {
        return $this->variation->label;
    }

    /**
     * Get variation name
     */
    public function getTypeSlugAttribute()
    {
        return $this->variation->attribute->slug;
    }


    /**
     * get value
     */
    public function getItemValueAttribute()
    {
        $value = null;
        $value = $value ?? $this->variation->type == 'color' ?  "https://singlecolorimage.com/get/".substr($this->variation->value, 1)."/100x100" : ( $this->variation->type == 'image' ? $this->variation->featuredImage() : $this->variation->value );
        return $value;
    }

     /**
     * get value
     */
    public function getImageAttribute()
    {
        return ($this->value && $this->value->featuredImage())  ? $this->value->featuredImage() : url(setting('product_placeholder_image')->value);
    }

    public function getAncestorNameAttribute()
    {
        return $this->parent ? $this->parent->ancestorName." &rarr; ".$this->name : $this->name;
    }

    /**
     * get variation value
     */
    public function value()
    {
        return $this->hasOne(ProductVariationOptionValue::class, 'product_variation_id', 'id');
    }

    public function getPriceAttribute()
    {
        return $this->value()->first()->getPrice();
    }
    
}
