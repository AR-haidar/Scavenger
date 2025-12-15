<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AiClassifications;

class AiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AiClassifications::factory()->count(30)->create();
    }
}
