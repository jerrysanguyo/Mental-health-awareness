<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    Support\Facades\Auth,
};
use App\{
    Models\Question,
    Models\Answer,
    Models\Recommendation,
    Models\Summary,
};

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user()->id;
        $listOfAnswer = Answer::with('question')->get();
        $recommendations = Recommendation::getRecommendationPerUser($user);
        $recomCheck = Recommendation::recommendationCheck($user);
        $summary = Summary::getSummary($user)->get();
    
        return view('home', compact(
            'listOfAnswer',
            'recommendations',
            'recomCheck',
            'summary'
        ));
    }
}
