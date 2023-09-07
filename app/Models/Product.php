<?php

namespace App\Models;

use App\Enums\ProductType;
use App\Enums\Status;
use ArrayAccess;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\Tags\HasTags;

class Product extends Model implements HasMedia
{
    use HasFactory, HasTranslations, HasTranslatableSlug, InteractsWithMedia, HasTags;
    use \Znck\Eloquent\Traits\BelongsToThrough;
    use \Znck\Eloquent\Traits\HasTableAlias;

    protected $fillable = [
        'id',
        'title',
        'slug',
        'short_desc',
        'desc',
        'type',
        'sku',
        'barcode',
        'qty',
        'price',
        'status',
    ];

    public $translatable = [
        'title',
        'slug',
        'short_desc',
        'desc'
    ];

    protected $casts = [
        'price' => 'array'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function scopePublished($query)
    {
        return $query->where('status', Status::PUBLISHED)->orWhere('status', Status::ACTIVE);
    }

    public function attributesToArray()
    {
        $translatedAttributes = collect($this->getTranslatableAttributes())
            ->mapWithKeys(function (string $key) {
                return [$key => $this->getAttributeValue($key)];
            })
            ->toArray();

        return array_merge(parent::attributesToArray(), $translatedAttributes);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function setShortDescAttribute($val)
    {
        $this->attributes['short_desc'] = strip_tags($val);
    }
   
    /**
     * Get product price
     */
    public function getPrice() : array
    {
        return ($this->type == ProductType::SIMPLE ? $this->price : (
                                                        $this->type == ProductType::VARIABLE 
                                                        ? $this->price ?? array_merge(["min" => $this->variationOptions()->whereHas('value')->first()->price], ["max"=>$this->variationOptions()->whereHas('value')->latest()->first()->price])
                                                        : [] ));
    }

    // get product variation groups
    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id', 'id')->whereNull('parent_id');
    }

    // get product variation groups
    public function variationOptions()
    {
        return $this->hasMany(ProductVariation::class, 'product_id', 'id');
    }

    /**
     * Get product varation attributes slugs
     */
    public function getVariationsAttributeSlugsAttribute()
    {
        return $this->variations()->with('variation.attribute')->get()->groupBy("variation.attribute.slug");
    }

    /**
     * Active scope
     */
    public function scopeActive($query)
    {
        return $query->where('status', Status::ACTIVE);
    }

    /**
     * following few methods are responsible for product variations for grouped products
     */
    public function groupProducts()
    {
        return $this->hasMany(ProductGroupItem::class, 'product_id', 'id');
    }

    public function gallery()
    {
        return $this->getMedia('gallery');
    }

    public function featuredImage()
    {
        return $this->getMedia('featured_image')->first();
    }

    public function getFeaturedImageAttribute()
    {
        return optional($this->featuredImage())->getUrl() ?? url(setting('product_placeholder_image'));
    }

    public function getThumbnailImageAttribute()
    {
        return ( $this->featuredImage() != null && $this->featuredImage()->hasGeneratedConversion('thumb')) 
                ? $this->featuredImage()->getUrl('thumb') 
                : $this->featured_image;
    }

    public function categories()
    {
        return $this->morphToMany(
            Category::class,
            'categorizable',
            ModelHasCategory::class,
            'categorizable_id'
        );
    }

    public function syncCategories(array | ArrayAccess $categories)
    {
        $categories = collect(Category::findOrCreate($categories));
        $this->tags()->sync($categories->pluck('id')->toArray());
        return $this;
    }

    public function brand()
    {
        return $this->hasOneThrough(Brand::class, ProductHasBrand::class, 'product_id', 'id', 'id', 'brand_id');
    }

    public function shippingClass()
    {
        return $this->hasOneThrough(ShippingClass::class, ProductHasClass::class, 'product_id', 'id', 'id', 'class_id');
    }

    public function attributes()
    {
        return $this->hasManyThrough(AttributeOption::class, ProductHasAttribute::class, 'product_id', 'id', 'id', 'attribute_option_id');
    }

     /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'products_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
 
        // Customize the data array...
 
        return $array;
    }


    public function services() {
        return $this->morphToMany('App\Models\Product', 'model', 'model_has_services', 'model_id', 'model_id', 'id', 'id', Service::class);
    }
}
