<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'teacher_name',
        'teacher_phone',
        'teacher_email',
        'designation_id',
        'teacher_address',
        'teacher_skill',
        'teacher_about',
        'teacher_image',
    ];

    public function coursedetail()
    {
        return $this->hasMany(Coursedetail::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function teacherassign()
    {
        return $this->hasMany(Teacherassign::class);
    }
}
