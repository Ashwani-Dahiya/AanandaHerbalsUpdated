<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    protected $table = "brands";
    protected $fillable = ['name', 'logo', 'seq','discount'];
    public function section()
    {
        return $this->belongsTo(SectionModel::class, 'id', 'seq');
    }

    public function products()
    {
        return $this->hasMany(ProductModel::class, 'brand_id', 'id');
    }
}
