<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * For unregistered users, only 'uuid' is required.
     * For registered users, additional fields are filled.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * Hides sensitive fields like 'password' and 'remember_token'.
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
     * Casts 'email_verified_at' to datetime.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user progresses for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userProgresses()
    {
        return $this->hasMany(UserProgress::class);
    }

    /**
     * Get the HTTP requests for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function httpRequests()
    {
        return $this->hasMany(HttpRequest::class);
    }

    /**
     * Determine if the user is registered.
     *
     * @return bool
     */
    public function isRegistered()
    {
        return !is_null($this->email);
    }
}
