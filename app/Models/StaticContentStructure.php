<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticContentStructure extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'multiple'
    ];

    public function parts()
    {
        return $this->hasMany(StructurePart::class, 'structure_id')->orderBy('order');
    }
}
