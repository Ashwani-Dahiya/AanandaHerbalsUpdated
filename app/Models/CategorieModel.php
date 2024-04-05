<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieModel extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $primaryKey= 'id';
    protected $fillable = ['name','image','seq'] ;
public function category() {
    return $this->belongsTo(CategorieModel::class,'category_id','id');
}
}
