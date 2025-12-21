<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'job_name',
        'email',
        'password',
        'summary',
        'photo',
        'github',
        'linkedin',
        'twitter',
        'instagram',
        'facebook',
        'youtube',
        'portfolio',
        'behance',
        'dribbble',
        'codepen',
        'contact_email',
        'phone1',
        'phone2',
        'telegram',
        'whatsapp',
        'skype',
        'discord',
        'viber',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's skills
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * Get the user's projects
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get the user's reviews
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
