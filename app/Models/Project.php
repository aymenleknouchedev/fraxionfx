<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'url',
        'image',
        'pdf',
        'status',
    ];

    /**
     * Get the user that owns the project
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the skills associated with this project
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skill');
    }
}
