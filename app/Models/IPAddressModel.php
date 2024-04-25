<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPAddressModel extends Model
{
    use HasFactory;
    protected $table = 'ip_address';
    protected $fillable = [
        'ip_address',
    ];
}
