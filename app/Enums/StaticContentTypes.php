<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StaticContentTypes extends Enum
{
    const TEXT          = 'text';
    const EDITOR        = 'editor';
    const IMAGE         = 'image';
    const ACTION        = 'action';
    const IMAGE_CROPPER = 'image_cropper';
}
