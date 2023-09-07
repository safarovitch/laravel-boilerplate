<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ImageSize extends Enum
{
    const PRODUCT_CATEGORY_IMAGE_SIZE = '300,400';
    const PRODUCT_FEATURED_IMAGE_SIZE = '570,740';
    const PRODUCT_GALLERY_IMAGE_SIZE = '570,740';
    const POST_FEATURED_IMAGE_SIZE = '1920,1200';

    const BRAND_ICON_IMAGE_SIZE = "200,200";
    const STATIC_CONTENT_IMAGE_SIZE = "100,100";
}
