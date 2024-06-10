<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Jane Nani',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jennie Kim',
                'email' => 'merchant1@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'merchant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jisoo Kim',
                'email' => 'merchant2@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'merchant',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($data);
    }
}
