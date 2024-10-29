<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';
    protected $fillable = [
        'question_id',
        'name',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public static function getAllAnswers()
    {
        return self::all();
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
