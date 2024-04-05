<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLastBannerModel extends Model
{
    use HasFactory;
    protected $table = 'home_last_banner';
    protected $fillable = [
        'image',
        'title',
        'discount',
    ];
}
