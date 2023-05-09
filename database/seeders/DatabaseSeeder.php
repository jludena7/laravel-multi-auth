<?php

namespace Database\Seeders;

use Database\Seeders\Internal;
use Database\Seeders\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Internal\UserSeeder::class,
            Site\UserSeeder::class,
        ]);
    }
}
