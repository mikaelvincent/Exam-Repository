<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    use HasFactory;

    protected $table = 'user_progresses';

    protected $fillable = [
        'user_id',
        'answer_id',
        'is_active',
    ];

    /**
     * Get the user associated with the progress.
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
