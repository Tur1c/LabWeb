<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->insert([
            'id' => Str::uuid(),
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        // User::create([
        //     'name' => 'user',
        //     'email' => 'user@gmail.com',
        //     'password' => bcrypt('password'),
        //     'role' => 'user'
        // ]);
    }
}
