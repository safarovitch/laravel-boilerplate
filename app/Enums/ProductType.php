<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProductType extends Enum
{
    const SIMPLE = 'simple';
    const VARIABLE = 'variable';
    // const GROUPED = 'grouped';
}
