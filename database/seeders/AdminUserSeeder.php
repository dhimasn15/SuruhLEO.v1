<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // ✅ Pastikan baris ini ada

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin SuruhLEO',
            'email' => 'admin@suruhleo.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@suruhleo.com',
            'password' => Hash::make('user123'),
            'is_admin' => false,
        ]);
    }
}
