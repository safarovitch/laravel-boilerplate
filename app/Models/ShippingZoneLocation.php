<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingZoneLocation extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipping_zone_locations';

    // Disable Laravel's mass assignment protection
    protected $guarded = [];

    public function zone() : BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }
}
