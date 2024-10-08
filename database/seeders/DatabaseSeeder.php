<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdSeeder::class,
        ]);
    }
}
