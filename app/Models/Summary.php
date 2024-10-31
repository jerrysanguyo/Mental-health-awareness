<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;
    
    protected $table = 'summaries';
    protected $fillable = [
        'user_id',
        'summary',
    ];

    public static function getSummary($user)
    {
        return self::where('user_id', $user);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
