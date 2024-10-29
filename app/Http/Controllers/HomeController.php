<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Models\Question,
    Models\Answer,
};

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listOfAnswer = Answer::with('question')->get();
    
        return view('home', compact('listOfAnswer'));
    }
}
