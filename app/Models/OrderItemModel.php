<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OrderItemModel extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'original_price',
        'discounted_price',
        'offer_id',
        'item_count',
        'total_price',

    ] ;
    public function order()
    {
        return $this->belongsTo(OrderModel::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id', 'id');
    }


}
