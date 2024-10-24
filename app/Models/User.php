<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * For registered users, these include name, email, and password.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * Hides sensitive information from array or JSON representations.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
    ];

    /**
     * Get the user progresses associated with the user.
     */
    public function userProgresses()
    {
        return $this->hasMany(UserProgress::class);
    }

    /**
     * Get the HTTP requests made by the user.
     */
    public function httpRequests()
    {
        return $this->hasMany(HttpRequest::class);
    }
}
