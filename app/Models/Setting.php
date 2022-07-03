<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'company_name',
        'company_phone',
        'company_email',
        'company_logo',
        'web_link',
        'address',
    ];
}
