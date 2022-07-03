<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couresetopic extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'module_name',
        'module_class',
        'coursedetail_id',
    ];

    public function coursedetail()
    {
        return $this->belongsTo(Coursedetail::class);
    }
}
