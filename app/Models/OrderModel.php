<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'address_id',
        'total_price',
        'phone1',
        'phone2',
        'total_discounted_price',
        'offer_applied',
        'price_after_offer',
        'estimate_date',
        'cancelled_by',
        'cancelled_by_admin',
        'cancelled_remark',
        'cancelled_date',
        'remark',
        'order_status',
        'order_num',
        'coupon_name',
        'coupon_code',
        'discount_percentage',
        'price_after_coupon',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(AddressModel::class);
    }

    public function cart()
    {
        return $this->belongsTo(CartModel::class);
    }

    // Define relationship with OrderItemModel
    public function orderItems()
    {
        return $this->hasMany(OrderItemModel::class);
    }
}
