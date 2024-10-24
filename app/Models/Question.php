<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'exam_set_id',
        'name',
        'slug',
        'content',
        'image_src',
        'image_alt',
    ];

    /**
     * Get the exam set that owns the question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examSet()
    {
        return $this->belongsTo(ExamSet::class);
    }

    /**
     * Get the answers for the question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Get the explanations for the question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function explanations()
    {
        return $this->hasMany(Explanation::class);
    }
}
