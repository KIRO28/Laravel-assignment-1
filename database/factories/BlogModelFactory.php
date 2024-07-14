<?php

namespace Database\Factories;

use App\Models\BlogModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogModelFactory extends Factory
{
    protected $model = BlogModel::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'Author' => $this->faker->name,
            'Description' => $this->faker->paragraph,
            'Date' => $this->faker->date,
        ];
    }
}
