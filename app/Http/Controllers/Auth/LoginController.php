<?php

namespace App\Http\Controllers\Auth;

use App\{
    Models\User,
    Services\LoginService,
    Http\Requests\Auth\LoginRequest,
    Http\Controllers\Controller,
};
use Illuminate\{
    Support\Facades\Auth,
};

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $redirect = $this->loginService->login($data);

        // Handle login failure
        if (!$redirect) {
            return redirect()->route('login')->withErrors(['error' => 'Invalid credentials']);
        }

        return $redirect;
    }

    public function logout()
    {
        return $this->loginService->logout();
    }
}
