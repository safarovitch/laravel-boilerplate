<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Brand extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'catalog_url',
        'owner_manual_url'
    ];

    protected $translatable = [
        'description',
    ];

    public function getLogoAttribute()
    {
        return $this->getFirstMedia() != null ? $this->getFirstMediaUrl() : "https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=" . $this->name;
    }
    
    public function setLogoAttribute($value)
    {
        $this->clearMediaCollection();
        $this->addMediaFromRequest($value)->toMediaCollection('logo');
    }
}
