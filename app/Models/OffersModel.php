<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffersModel extends Model
{
    use HasFactory;
    protected $table = 'offers';
    protected $fillable = [
        'name',
        'price',
        'type',
        'value',
    ] ;
}
