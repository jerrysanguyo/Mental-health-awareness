<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function wellBeing()
    {
        return view('well_being');
    }
}
