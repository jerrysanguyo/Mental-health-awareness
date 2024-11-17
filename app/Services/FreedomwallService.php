<?php

namespace App\Services;

use App\Models\Freedomwall;

class FreedomwallService
{
    public function store(array $data): Freedomwall
    {
        return Freedomwall::create([
            'nick_name' =>  $data['nick_name'],
            'title'     =>  $data['title'],
            'post'      =>  $data['post'],
        ]);
    }

    public function update($freedomwall, array $data): Freedomwall
    {
        $freedomwall->update([
            'nick_name' =>  $data['nick_name'],
            'title'     =>  $data['title'],
            'post'      =>  $data['post'],
        ]);

        return $freedomwall;
    }
}