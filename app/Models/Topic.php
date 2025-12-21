<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /** @use HasFactory<\Database\Factories\TopicFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'icon',
    ];

    /**
     * Get the user that owns the topic
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
