<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFreedomwallRequest;
use App\Http\Requests\UpdateFreedomwallRequest;
use App\{
    Models\Freedomwall,
    Services\FreedomwallService,
};

class FreedomwallController extends Controller
{
    protected $freedomwallService;

    public function __construct(FreedomwallService $freedomwallService)
    {
        $this->freedomwallService = $freedomwallService;
    }

    public function index()
    {
        $posts = Freedomwall::getAllPosts();
        return view('freedom.index', compact(
            'posts',
        ));
    }
    
    public function store(StoreFreedomwallRequest $request)
    {
        $this->freedomwallService->store($request->validated());

        return redirect()->route('freedomwall.index')
            ->with('success', 'Posted successfully!');
    }

    public function edit(Freedomwall $freedomwall)
    {
        return view('freedom.edit', compact('freedomwall'));
    }

    public function update(StoreFreedomwallRequest $request, $freedomwall)
    {
        $id = Freedomwall::findOrFail($freedomwall);
        $this->freedomwallService->update($id, $request->validated());

        return redirect()->route('freedomwall.edit', $id)
            ->with('success', 'Post updated successfully!');
    }
}
