<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ADMIN()
 * @method static static MANAGER()
 * @method static static EDITOR()
 * @method static static CUSTOMER()
 */
final class UserRole extends Enum
{
    const SU =   'SU';
    const ADMIN =   'Admin';
    const MANAGER =   'Manager';
    const EDITOR =   'Editor';
    const CUSTOMER = 'Customer';
}
