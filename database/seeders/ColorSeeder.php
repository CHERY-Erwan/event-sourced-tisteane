<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

final class ColorSeeder extends Seeder
{
    public function run()
    {
        Color::create(['code' => 'BLACK', 'label' => ['en' => 'Black', 'fr' => 'Noir']]);
        Color::create(['code' => 'LIGHT-GREEN', 'label' => ['en' => 'Light Green', 'fr' => 'Vert clair']]);
        Color::create(['code' => 'AZURE-BLUE', 'label' => ['en' => 'Azure Blue', 'fr' => 'Bleu azure']]);
        Color::create(['code' => 'ANTIQUE-PINK', 'label' => ['en' => 'Antique Pink', 'fr' => 'Rose antique']]);
        Color::create(['code' => 'MELON', 'label' => ['en' => 'Melon', 'fr' => 'Melon']]);
    }
}
