<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;
use Exception;

class SeederService
{
    public function seeder($seed)
    {
        Artisan::call('db:seed', [
            '--class'   =>  $seed
        ]);

        return 'Question seeded successfully!';
    }
}