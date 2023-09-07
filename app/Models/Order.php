<?php

namespace App\Models;

use App\Enums\AddressType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'distributor_id',
        'sub_total',
        'total',
        'tax_total',
        'shipping_total',
        'discount_total',
        'note',
        'currency_code',
        'status'
    ];

    /**
     * Get the name of the index associated with the model.
     *
     * @return string
     */
    // public function searchableAs()
    // {
    //     return 'orders_index';
    // }

    /**
     * Order items
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        return $this->hasMany(OrderAddress::class);
    }

    /**
     * Order shipping address
     */
    public function getShippingAddressAttribute()
    {
        $address = $this->hasOne(OrderAddress::class)->where('address_type', AddressType::SHIPPING)->first();
        if ($address) {
            return sprintf("<h5 class='mb-0'>%s</h5>%s %s<br> %s, %s,<br>%s<br><strong>%s</strong><strong>%s</strong>", $address->name, $address->address_1, $address->address_2, $address->city, $address->state, $address->zip, $address->phone, $address->email);
        }
        return null;
    }

    /**
     * Order billing address
     */
    public function getBillingAddressAttribute()
    {
        $address = $this->hasOne(OrderAddress::class)->where('address_type', AddressType::BILLING)->first();
        if ($address) {
            return sprintf("<h5 class='mb-0'>%s</h5>%s %s<br> %s, %s,<br>%s<br><strong>%s</strong><strong>%s</strong>", $address->name, $address->address_1, $address->address_2, $address->city, $address->state, $address->zip, $address->phone, $address->email);
        }
        return null;
    }

    public function customer(){
        return $this->hasOne(User::class,'id','user_id');
    }


    public function activity()
    {
        return $this->hasMany(OrderActivity::class);
    }
}
