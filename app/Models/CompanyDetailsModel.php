<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'company_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_name',
        'web_title',
        'company_mobile_1',
        'company_mobile_2',
        'company_email_1',
        'company_email_2',
        'company_website',
        'company_address',
        'company_map_link',
    ];
}
