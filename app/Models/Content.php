<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'type',
        'url',
        'content',
        'metadata',
        'favorite',
        'status',
        'image'
    ];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
