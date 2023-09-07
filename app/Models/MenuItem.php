<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'menu_id',
        'title',
        'url',
        'icon',
        'type',
        'order'
    ];
}
