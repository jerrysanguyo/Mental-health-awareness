<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Services\SeederService;

class SeederController extends Controller
{
    protected $seederService;

    public function __construct(SeederService $seederService)
    {
        $this->seederService = $seederService;
    }

    public function seeder(Request $request)
    {
        $seed = $request->input('seed');
        $seedClass = ucfirst($seed) . 'Seeder'; // Capitalize the first letter
        $this->seederService->seeder($seedClass);

        return redirect()->route('superadmin.'.$seed.'.index')
            ->with('success', 'Seeded successfully!');
    }
}
