<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question_id',
        'label',
        'content',
        'image_src',
        'image_alt',
        'is_correct',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_correct' => 'boolean',
    ];

    /**
     * Get the question that owns the answer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the user progresses for the answer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userProgresses()
    {
        return $this->hasMany(UserProgress::class);
    }
}
