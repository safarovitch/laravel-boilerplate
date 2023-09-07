<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, HasTranslatableSlug;

    protected $fillable = [
        'model_type',
        'title',
        'slug',
        'parent_id',
        'menu_icon'
    ];

    public $translatable = [
        'title',
        'slug',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs();
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function hasParent()
    {
        return $this->parent()->exists();
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function hasChildren()
    {
        return $this->children()->exists();
    }

    public function getNameAttribute()
    {
        return $this->title;
    }

    public function scopeMain($query)
    {
        return $query;
        return $query->whereNull('parent_id');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'categorizable', 'model_has_categories');
    }
}
