<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PromotionalPost>
 */
class PromotionalPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->sentence($nbWords = 6, $variableNbWords = true);
        $photo_path = str_replace('.', '', $name);
        $photo_path = strtolower(str_replace(' ', '-', $photo_path)) . '.jpeg';
        return [
            'name' => $name,
            'description' => fake()->text($maxNbChars = 200),
            'photo_path' => 'develop/promotional_posts/'.$photo_path,
            'visible' => true,
        ];
    }
}
