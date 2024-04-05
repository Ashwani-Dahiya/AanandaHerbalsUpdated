<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $fillable = ['title','short_title','image','short_title','about','long_about','written_by','date'] ;
}
