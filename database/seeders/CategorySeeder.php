<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        DB::table('m_category')->insert([
            ['id' => 1, 'category_name' => 'Issue', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'category_name' => 'Bug', 'status' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
