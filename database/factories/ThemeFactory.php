<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Theme>
 */
class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $themeNames = [
            'Modern',
            'Classic',
            'Elegant',
            'Minimal',
            'Rustic',
            'Vintage',
            'Urban',
            'Luxury',
            'Casual',
            'Trendy'
        ];

        $colors = [
            'red',
            'blue',
            'green',
            'yellow',
            'purple',
            'orange',
            'pink',
            'teal',
            'indigo',
            'amber'
        ];

        $randomColor = $this->faker->randomElement($colors);
        $randomTheme = $this->faker->randomElement($themeNames);

        $isPremium = $this->faker->boolean(30); // %30 ihtimalle premium

        return [
            'name' => $randomTheme . ' ' . ucfirst($randomColor),
            'description' => $this->faker->paragraph(),
            'preview_image' => null,
            'is_premium' => $isPremium,
            'price' => $isPremium ? $this->faker->randomFloat(2, 9.99, 49.99) : 0,
            'is_active' => $this->faker->boolean(90), // %90 ihtimalle aktif
            'config' => [
                'primary_color' => $randomColor,
                'font_family' => $this->faker->randomElement(['Arial', 'Roboto', 'Open Sans', 'Montserrat', 'Lato']),
                'layout' => $this->faker->randomElement(['grid', 'list', 'masonry']),
            ],
            'version' => '1.0.0',
        ];
    }
}
