<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Jose Luis',
            'email' => 'jreyes@saycocorporativo.com',
            'password' => '$2y$10$jPNQiy5hnP4Vqk9inlnh1Ob06capgEo5xxG9HX7hJQ8yaSa2yzTCe',
            'remember_token' => Str::random(10),
        ]);
    }
}
