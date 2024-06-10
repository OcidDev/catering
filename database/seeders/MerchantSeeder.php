<?php

namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 3,
                'company_name' => 'Seblak Makmur',
                'company_logo' => null,
                'company_description' => 'Seblak enak tiada tara',
                'company_phone' => '08123456789',
                'company_address' => 'Jl. Raya No. 1',
                'company_ward' => 'Panjunan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'company_name' => 'Mie Ayam Enak',
                'company_logo' => null,
                'company_description' => 'Mie Ayam Enak tiada tara',
                'company_phone' => '08123456789',
                'company_address' => 'Jl. Raya No. 2',
                'company_ward' => 'Kedawung',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        Merchant::insert($data);
    }
}
