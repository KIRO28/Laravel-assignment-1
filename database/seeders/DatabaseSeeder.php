<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BlogModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(BlogSeeder::class);

        // User::factory(5)
        //     ->has(BlogModel::factory(10))
        //     ->create();

    }
}
