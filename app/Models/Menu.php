<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Menu extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'short_code',
        'css',
        'active'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
        ->generateSlugsFrom('name')
        ->saveSlugsTo('short_code')
        ->usingSeparator('_');
    }

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
