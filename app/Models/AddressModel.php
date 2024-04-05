<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = [
        'user_id',
        'name',
        'address_line1',
        'address_line2',
        'city',
        'near_by',
        'state',
        'country',
        'pin',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderModel::class);
    }
}
