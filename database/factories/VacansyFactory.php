<?php

namespace Database\Factories;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VacansyFactory extends Factory
{
    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'vacansy_title' => $this->faker->word(),
            'vacansy_alias' => $this->faker->word(),
            'vacansy_description' => $this->faker->text(),
            'vacansy_images' => $this->faker->word(),
            'seo_title' => $this->faker->word(),
            'seo_description' => $this->faker->text(),
            'seo_key' => $this->faker->word(),
        ];
    }
}
