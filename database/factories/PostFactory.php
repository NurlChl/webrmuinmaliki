<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'member_category_id' => rand(1,3),
            'tittle' => fake()->sentence(),
            'slug' => Str::slug(( fake()->sentence())),
            'body' => fake()->text(),
        ];
    }
}
