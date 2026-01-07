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
        'summary',
        'image',
        'video_url',
        'video',
        'model_file',
        'project_date',
        'project_duration',
        'client_name',
        'category',
        'status',
        'progress',
    ];

    protected $casts = [
        'project_date' => 'date',
        'progress' => 'integer',
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

    /**
     * Get the gallery images for the project
     */
    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order')->orderBy('id');
    }
}
