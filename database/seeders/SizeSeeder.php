<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

final class SizeSeeder extends Seeder
{
    public function run()
    {
        Size::create(['code' => 'U', 'label' => ['en' => 'Unique', 'fr' => 'Unique']]);
        Size::create(['code' => 'S', 'label' => ['en' => 'Small', 'fr' => 'Petit']]);
        Size::create(['code' => 'M', 'label' => ['en' => 'Medium', 'fr' => 'Moyen']]);
        Size::create(['code' => 'L', 'label' => ['en' => 'Large', 'fr' => 'Grand']]);
    }
}
