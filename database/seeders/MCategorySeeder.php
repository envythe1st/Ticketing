<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_user')->insert([
            'name' => 'Admin',
            'photo' => 'default.png',
            'bio' => 'Administrator utama',
            'm_role' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
