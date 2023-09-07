<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class StaticContent extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'structure_id',
        'name',
        'slug',
        'locale',
        'description',
        'status'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name'])
            ->saveSlugsTo('slug')
            ->allowDuplicateSlugs();
    }

    public function items()
    {
        return $this->hasMany(StaticContentItem::class, 'content_id')->orderBy('order');
    }

    public function structure()
    {
        return $this->belongsTo(StaticContentStructure::class);
    }
}
