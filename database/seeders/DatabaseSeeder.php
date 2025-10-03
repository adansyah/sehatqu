<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::create([
            'name' => 'sehatqu',
            'email' => 'sehatqu@gmail.com',
            'password' => bcrypt(123),
            'is_admin' => 1,
            'is_mamber' => 0,
            'role' => 1
        ]);
    }
}
