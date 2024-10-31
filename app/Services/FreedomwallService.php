<?php

namespace App\Services;

use App\Models\Freedom;

class FreedomwallService
{
    public function store(array $data): Freedom
    {
        return Freedom::create([
            'nick_name' =>  $data['nick_name'],
            'post'      =>  $data['post'],
        ]);
    }
}