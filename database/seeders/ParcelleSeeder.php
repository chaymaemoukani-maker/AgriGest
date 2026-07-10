<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Parcelle;

class ParcelleSeeder extends Seeder
{
    public function run(): void
    {
        Parcelle::factory()->count(10)->create();
    }
}