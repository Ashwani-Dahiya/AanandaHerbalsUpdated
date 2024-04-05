<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignUpModel extends Model
{
    use HasFactory;
    protected $table = "signupdata";
    protected $fillable = ['first_name','last_name','email','password','phone_number','address','country','state','city','post_code',];
}
