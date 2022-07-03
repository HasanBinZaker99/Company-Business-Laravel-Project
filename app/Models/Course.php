<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_name',
        'course_price',
        'course_length',
        'course_lessons',
        'course_image',
        'long_details',
    ];

    public function coursedetail()
    {
        return $this->hasMany(Coursedetail::class);
    }

    public function admission()
    {
        return $this->hasMany(Admission::class);
    }
}
