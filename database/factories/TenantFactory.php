<?php

namespace Database\Factories;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Rastgele bir tema ID'si al veya ilk temayı kullan
        $themeId = Theme::inRandomOrder()->first()?->id ?? null;

        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->companyEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'theme_id' => $themeId,
            'is_active' => $this->faker->boolean(80), // %80 ihtimalle aktif
        ];
    }
}
