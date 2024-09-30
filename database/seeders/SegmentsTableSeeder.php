<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SegmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('segments')->insert([
            [
                'name' => 'Marketing',
                'criteria' => json_encode(['age' => '18-30', 'interests' => ['online shopping', 'social media']]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sales',
                'criteria' => json_encode(['age' => '25-45', 'interests' => ['business', 'investing']]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Support',
                'criteria' => json_encode(['age' => '20-50', 'interests' => ['customer service', 'problem-solving']]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
