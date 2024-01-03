<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get all tracks that are assigned to this user.
     */
    public function track_likes(): MorphToMany
    {
        return $this->morphedByMany(Track::class, 'likable');
    }

    /**
     * Get all resources that are assigned to this user.
     */
    public function resource_likes(): MorphToMany
    {
        return $this->morphedByMany(Resource::class, 'likable');
    }

    /*
    public function track_likes(): BelongsToMany {
        return $this->belongsToMany(Track::class);
    }

    public function resource_likes(): BelongsToMany {
        return $this->belongsToMany(Resource::class);
    }
    */

    //Owner
    public function tracks(): HasMany {
        return $this->hasMany(Track::class);
    }

    public function feedbacks(): HasMany {
        return $this->hasMany(Feedback::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
