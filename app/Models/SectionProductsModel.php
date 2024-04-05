<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionProductsModel extends Model
{
    use HasFactory;
    protected $table = 'section_products';
    protected $fillable = [
        'section_id',
        'product_id',
        'seq',
    ] ;
}
