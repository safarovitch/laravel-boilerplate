<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum
{
    const ACTIVE   = 'active';
    const INACTIVE = 'inactive';
    const PUBLISHED = 'published';
    const DRAFT    = 'draft';
    const BANNED   = 'banned';
}
