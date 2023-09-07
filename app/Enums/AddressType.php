<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AddressType extends Enum
{
    const SHIPPING =   "shipping";
    const BILLING  =   "billing";
    const BOTH     =   "shipping_billing";
}
