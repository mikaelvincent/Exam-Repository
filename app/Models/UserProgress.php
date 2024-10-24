<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
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
     * Allows mass assignment of these fields during model creation.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'answer_id',
        'is_active',
    ];

    /**
     * Get the user that owns the progress.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the answer associated with the progress.
     */
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
