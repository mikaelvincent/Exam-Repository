<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
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
     * Defines fillable attributes for mass assignment.
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
        'answers_sort_by',
        'answers_sort_order',
    ];

    /**
     * Get the exam set that the question belongs to.
     */
    public function examSet()
    {
        return $this->belongsTo(ExamSet::class);
    }

    /**
     * Get the answers for the question.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Get the explanations for the question.
     */
    public function explanations()
    {
        return $this->hasMany(Explanation::class);
    }
}
