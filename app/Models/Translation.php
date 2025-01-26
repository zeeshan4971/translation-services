<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends Model
{
    use HasFactory;
    protected $fillable = ['key', 'locale_id', 'content', 'tags'];

    protected $casts = [
        'tags' => 'array',
    ];

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
