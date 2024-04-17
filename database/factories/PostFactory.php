<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
            'title' => $this->faker->word(),
            'post_alias' => $this->faker->word(),
            'description' => $this->faker->text(),
            'post_img' => $this->faker->imageUrl('650', '300', 'null', false, null,false, 'jpeg')
        ];
    }
}
