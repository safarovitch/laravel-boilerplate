<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticContentItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'order'
    ];

    public function parts()
    {
        return $this->hasMany(StaticContentItemPart::class, 'content_item_id', 'id');
    }
}
