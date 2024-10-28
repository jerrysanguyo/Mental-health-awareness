<?php

namespace App\Http\Controllers\Auth;

use App\{
    Models\User,
    Services\RegisterService,
    Http\Requests\Auth\RegisterRequest,
    Http\Controllers\Controller,
};

class RegisterController extends Controller
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $this->registerService->store($request->validated());

        return redirect()->route()
            ->with('success', 'You have successfully registered!');
    }

}
