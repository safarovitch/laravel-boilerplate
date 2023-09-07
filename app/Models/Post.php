<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use HasTranslatableSlug;
    use InteractsWithMedia;
    use HasTags;
    use Searchable;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'author_id',
        'status'
    ];

    public $translatable = [
        'title',
        'slug',
        'body'
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


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
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

    public function categories()
    {
        return $this->morphToMany(
            Category::class,
            'categorizable',
            ModelHasCategory::class,
            'categorizable_id'
        );
    }

    public function getFeaturedImageAttribute()
    {
        return optional($this->getMedia('featured_image')->first())->getUrl() ?? url(setting('post_placeholder_image')->value);
    }

     /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'posts_index';
    }

}
