<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class InputType extends Enum
{
    const TEXT =   'text';
    const TEXTAREA =   'textarea';
    const SELECT = 'select';
    const SELECT2 = 'select2';
    const CHECKBOX = 'checkbox';
    const RADIO = 'radio';
    const FILE = 'file';
    const IMAGE = 'image';
    const DATE = 'date';
    const DATETIME = 'datetime';
    const TIME = 'time';
    const COLOR = 'color';
    const NUMBER = 'number';
    const PASSWORD = 'password';
    const EMAIL = 'email';
}
