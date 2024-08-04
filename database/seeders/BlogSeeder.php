<?php

namespace Database\Seeders;

use App\Models\BlogModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogModel::factory()->count(10)->create();
    }
}
