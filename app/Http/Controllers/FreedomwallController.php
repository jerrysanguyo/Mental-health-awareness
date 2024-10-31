<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFreedomwallRequest;
use App\Http\Requests\UpdateFreedomwallRequest;
use App\Models\Freedomwall;

class FreedomwallController extends Controller
{
    public function index()
    {
        return view('freedom.index');
    }
    
    public function store(StoreFreedomwallRequest $request)
    {
        //
    }
    
    public function show(Freedomwall $freedomwall)
    {
        //
    }
    
    public function destroy(Freedomwall $freedomwall)
    {
        //
    }
}
