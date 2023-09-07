<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructurePart extends Model
{
    use HasFactory;

    protected $fillable = [
        'structure_id',
        'name',
        'type',
        'options',
        'order'
    ];


    public function getOptionsAttribute()
    {
        return json_decode($this->attributes['options']);
    }

    // public function setOptionsAttribute($options)
    // {
    //     $this->attributes['options'] = json_encode($options);
    // }

    public function getOptionsAttributeAttribute()
    {
        return $this->attributes['options'];
    }
    
}
