<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function endless()
    {
        return view('Game.endless.index');
    }

    public function flappy()
    {
        return view('Game.flappy.index');
    }

    public function tictactoe()
    {
        return view('Game.tictactoe.index');
    }
}
