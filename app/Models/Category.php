<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
