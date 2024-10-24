<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSet extends Model
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
     * Specifies which fields can be mass assigned.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'is_exam',
        'children_sort_by',
        'children_sort_order',
    ];

    /**
     * Get the parent exam set.
     */
    public function parent()
    {
        return $this->belongsTo(ExamSet::class, 'parent_id');
    }

    /**
     * Get the child exam sets.
     */
    public function children()
    {
        return $this->hasMany(ExamSet::class, 'parent_id');
    }

    /**
     * Get the questions associated with the exam set.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
