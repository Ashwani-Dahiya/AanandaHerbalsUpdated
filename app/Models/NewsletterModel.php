<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterModel extends Model
{
    use HasFactory;
    protected $table = 'newsletter_email';
    protected $fillable = [
        'email',
    ];

}
