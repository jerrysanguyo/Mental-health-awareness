<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\{
    Facades\Hash,
};


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_name' => 'jsanguyo',
            'full_name' => 'Jerry G. Sanguyo jr.',
            'password' => Hash::make('admin1234'),
            'role' => 'superadmin',
        ]);
    }
}
