<?php

namespace Database\Seeders\Internal;

use Illuminate\Database\Seeder;
use App\Models\Internal\User;

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
