<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Location extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'parent_id',
        'zip'
    ];

    protected $translatable =[
        'title'
    ];

    public function parent()
    {
        return $this->hasOne(Location::class, 'id', 'parent_id');
    }
}
