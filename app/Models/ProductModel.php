<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['name','abbr','brand_id','category_id','model','colors','image','price','discounted_price','about1','about2','warranty','year','available_products','sold_count',] ;
    public function brand()
    {
        return $this->belongsTo(BrandModel::class, 'brand_id', 'id');
    }
    public function carts()
    {
        return $this->hasMany(CartModel::class);
    }
}
