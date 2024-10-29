<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
use App\Models\Response;
use App\Services\ResponseService;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    protected $responseService;

    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }

    public function store(StoreResponseRequest $request)
    {
        $user = Auth::user();
        $this->responseService->storeResponses($user, $request->validated()['responses']);

        return redirect()->route($user->role . '.dashboard')->with('success', 'Your responses have been saved successfully!');
    }
}
