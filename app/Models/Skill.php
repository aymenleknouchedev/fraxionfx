<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'icon',
    ];

    /**
     * Get the user that owns the skill
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
