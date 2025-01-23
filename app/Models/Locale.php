<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $fillable = ['locale', 'name'];

    public function translations()
    {
        return $this->hasMany(Translation::class);
    }
}
