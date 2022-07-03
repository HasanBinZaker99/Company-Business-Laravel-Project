<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticeboard extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'short_title',
        'long_title',
        'date',
        'user_id',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
