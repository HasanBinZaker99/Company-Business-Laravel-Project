<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentID',
        'course_id',
        'batch_id',
        'date',
        'student_name',
        'student_email',
        'student_phone',
        'emergency_phone',
        'gender',
        'relationwith_emergency_phone',
        'name_ofrelation_number',
        'religion',
        'blood_group',
        'nid',
        'present_address',
        'permanent_address',
        'course_price',
        'discount',
        'due',
        'total_payment',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
