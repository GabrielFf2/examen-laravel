<?php

namespace Database\Seeders;

use App\Models\llibres;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class llibresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        llibres::create([
            'titol' => 'Llibre 1'
        ]);
    }
}
