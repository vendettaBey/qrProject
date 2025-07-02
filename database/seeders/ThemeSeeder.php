<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Temaları oluştur
        $themes = [
            [
                'name' => 'Restoran',
                'description' => 'Modern ve şık bir restoran teması',
                'folder_name' => 'restoran',
                'thumbnail' => 'themes/restoran/thumbnail.jpg',
                'is_active' => true,
                'tenant_id' => null // Genel tema
            ],
            [
                'name' => 'Theme2',
                'description' => 'Bermiz Restaurant tarzı modern menü teması',
                'folder_name' => 'theme2',
                'thumbnail' => 'themes/theme2/thumbnail.jpg',
                'is_active' => true,
                'tenant_id' => null // Genel tema
            ]
        ];

        foreach ($themes as $theme) {
            Theme::create($theme);
        }
    }
}
