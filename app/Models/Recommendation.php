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

    public static function getRecommendationPerUser($user)
    {
        return self::where('user_id', $user)->get();
    }

    public static function recommendationCheck($user)
    {
        return self::where('user_id', $user)->first();
    }
    
    public function response()
    {
        return $this->belongsTo(Response::class, 'response_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
