<?php

namespace App\Models;

use App\Enums\InputType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class VariationOption extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $fillable = [
        'variation_id',
        'label',
        'value',
        'type'
    ];

    protected $translatable = [
        'label',
        'value'
    ];

    /**
     * Get option variation group
     */
    public function variation()
    {
        return $this->belongsTo(Variation::class, 'variation_id');
    }

    /**
     * get value
     */
    public function getRenderedValueAttribute()
    {
        return $this->type == InputType::COLOR ?  
                "https://singlecolorimage.com/get/".substr($this->value, 1)."/100x100" 
                : ( $this->type == InputType::IMAGE ? Storage::url($this->value) 
                : ( $this->type == InputType::TEXT ? asset('sub-logo.jpg') : $this->value ) );
    }
}
