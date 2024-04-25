<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountModel extends Model

{
    use HasFactory;
    protected $table = 'discount_coupon';
    protected $fillable = [
        'on_festival_name',
        'discount_percentage',
        'coupon_code',
        'status',
    ];
}
