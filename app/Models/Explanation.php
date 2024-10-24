<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explanation extends Model
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
     * Allows mass assignment of specified attributes.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question_id',
        'content',
    ];

    /**
     * Get the question that the explanation belongs to.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
