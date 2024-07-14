<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogModel;

class BlogModelsTableSeeder extends Seeder
{
    public function run()
    {
        BlogModel::factory()->count(10)->create();
    }
}
