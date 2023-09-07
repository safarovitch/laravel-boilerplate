<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const NEW_ORDER  = 'new';
    const PENDING    = 'pending';
    const PROCESSING = 'processing';
    const SHIPPED    = 'shipped';
    const DELIVERED  = 'delivered';
    const COMPLETED  = 'completed';

    const CANCELLED  = 'cancelled';
    const DENIED     = 'denied';
    const FAILED     = 'failed';
    
    const REFUNDED   = 'refunded';
    const REFUND_REQUESTED = 'refund_requested';
}
