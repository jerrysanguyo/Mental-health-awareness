<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $table = 'recommendations';

    protected $fillable = [
        'user_id',
        'response_id',
        'recommendation',
    ];

    public static function getAllRecommendation()
    {
        return self::all();
    }

    public function response()
    {
        return $this->belongsTo(Response::class, 'reponse_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}