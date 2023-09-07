<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Variation extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasTranslatableSlug;

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $fillable = [
        'name',
        'slug',
        'type',
    ];

    protected $translatable = [
        'name',
        'slug'
    ];

    /**
     * Get options for the variation.
     */
    public function options()
    {
        return $this->hasMany(VariationOption::class);
    }
}
