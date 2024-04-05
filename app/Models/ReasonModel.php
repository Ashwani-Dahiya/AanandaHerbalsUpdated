<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonModel extends Model
{
    use HasFactory;
    protected $table = 'reasons';
    protected $fillable = ['reason'];
}
