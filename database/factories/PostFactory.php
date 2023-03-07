<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $name = $this->faker->name();
        return [
            'title' => $name,
            'slug' => Str($name)->slug(),
            'content' => fake()->paragraph(4, true),
            'description' => fake()->paragraph(1, true),
            'category_id' => fake()->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]),
            'posted' => fake()->randomElement(['yes', 'not']),
            'image' => fake()->imageUrl()
        ];
    }
}
