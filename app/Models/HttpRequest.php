<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HttpRequest extends Model
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
     * Specifies which attributes can be mass assigned.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'http_method',
        'path',
    ];

    /**
     * Get the user that made the HTTP request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
