<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = [
        'rating',
        'remark',
        'user_id',
        'product_id'

    ] ;
}
