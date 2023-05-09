<?php

namespace Database\Seeders\Site;

use Illuminate\Database\Seeder;
use App\Models\Site\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();
    }
}
