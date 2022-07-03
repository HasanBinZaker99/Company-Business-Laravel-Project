<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'batch_name',
        'student_capacity',
        'batchID',
        'batch_time',
        'start_date',
        'batch_session',
        'status',
    ];

    public function teacherassign()
    {
        return $this->hasMany(Teacherassign::class);
    }

    public function admission()
    {
        return $this->hasMany(Admission::class);
    }
}
