<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
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
     * Allows these attributes to be mass assigned.
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
     * Get the question that the answer belongs to.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the user progresses associated with the answer.
     */
    public function userProgresses()
    {
        return $this->hasMany(UserProgress::class);
    }
}
