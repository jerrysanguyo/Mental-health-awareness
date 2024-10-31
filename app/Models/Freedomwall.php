<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freedomwall extends Model
{
    use HasFactory;

    protected $table = 'freedomwalls';
    protected $fillable = [
        'nick_name',
        'post',
    ];
}
