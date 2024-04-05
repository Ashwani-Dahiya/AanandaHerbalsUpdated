<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BrandModel;

class SectionModel extends Model
{
    use HasFactory;
    protected $table = "sections";
    protected $fillable = ['name','image','seq'] ;
    public function brands()
    {
        return $this->hasMany(BrandModel::class, 'id', 'seq');
    }
    public function products()
    {
        return $this->belongsToMany(ProductModel::class, 'section_products', 'section_id', 'product_id');
    }
}
