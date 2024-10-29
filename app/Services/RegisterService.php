<?php

namespace App\Services;

use App\{
    Models\User,
};
use Illuminate\Support\{
    Facades\Hash,
};

class RegisterService
{
    public function store(array $data): User
    {
        return User::create([
            'user_name' =>  $data['user_name'],
            'full_name' =>  $data['full_name'],
            'password'  =>  Hash::make($data['password']),
            'role'      =>  'user',
        ]);
    }
}