<?php

namespace Database\Seeders;

use App\Models\AvailableReadingGuide;
use Illuminate\Database\Seeder;

class AvailableReadingGuidesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AvailableReadingGuide::create([
            'name' => 'Ano Bíblico - 2024',
            'version' => '1.0.0',
            'path_csv' => storage_path('csv').'/ano-biblico.csv',
        ]);
    }
}
