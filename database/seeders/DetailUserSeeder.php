<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailUser::insert([
            [
                'user_id' => 1,
                'photo' => null,
                'address' => 'Jl. Raya No. 1',
                'phone' => '08123456789',
                'gender' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'photo' => null,
                'address' => 'Jl. Raya No. 2',
                'phone' => '08123456789',
                'gender' => 'Laki-laki',
                'created_at' => now(),
                'updated_at' => now(),

            ]
        ]);
    }
}
