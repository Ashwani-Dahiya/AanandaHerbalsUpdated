<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;
    protected $table = "cities";
    protected $fillable = ['city','state_id'] ;
    public function states()
    {
        return $this->belongsTo(CityModel::class);
    }
}
