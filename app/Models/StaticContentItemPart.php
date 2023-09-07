<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticContentItemPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_item_id',
        'name',
        'type',
        'options',
        'order',
        'value',
        'structure_part_id'
    ];

    public function structureType()
    {
        return $this->hasOne(StructurePart::class, 'id', 'structure_part_id');
    }

    public function getValueAttribute()
    {
        return json_decode($this->attributes['value']);
    }
}
