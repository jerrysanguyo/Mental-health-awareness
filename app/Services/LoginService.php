<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(array $data)
    {
        if(Auth::attempt($data))
        {
            session()->regenerate();
            return $this->roleRedirect(Auth::user());
        }

        // login failure
        return false;
    }

    public function roleRedirect(User $user)
    {
        // redirect based on role
        return redirect()->route($user->role . '.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Logged out successfully!');
    }
}