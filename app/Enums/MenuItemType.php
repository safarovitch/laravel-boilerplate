<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MenuItemType extends Enum
{
    const URL = 'url';
    const ROUTE = 'route';
    const _BLANK = '_blank';
}
