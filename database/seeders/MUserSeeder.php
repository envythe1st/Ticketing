<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Issue', 'status' => 1],
            ['category_name' => 'Bug', 'status' => 2],
        ];

        DB::table('m_category')->insert($categories);
    }
}
