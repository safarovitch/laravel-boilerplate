<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'categorizable_id',
        'categorizable_type'
    ];

    public function categorizable()
    {
        return $this->morphTo();
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
