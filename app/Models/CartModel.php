<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $table = "add_carts";
    protected $fillable = [
        'user_id',
        'product_id',
        'times',
        'type',
        'ip_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItemModel::class);
    }
    public function order()
    {
        return $this->hasOne(OrderModel::class);
    }
}
