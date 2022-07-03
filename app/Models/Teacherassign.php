<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacherassign extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'designation',
        'batch_id',
        'teacher_id',
        'coursedetail_id',
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function coursedetail()
    {
        return $this->belongsTo(Coursedetail::class);
    }

    public function coursetopicdetails()
    {
        return $this->hasOneThrough(Coursedetail::class, Couresetopic::class);
    }
}
