<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'source',
        'publication_date',
        'external_link',
        'featured_image',
        'tags',
        'user_id',
    ];

    protected $casts = [
        'publication_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
