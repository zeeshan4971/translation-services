<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['key', 'locale_id', 'content', 'tags'];

    protected $casts = [
        'tags' => 'array',
    ];

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
