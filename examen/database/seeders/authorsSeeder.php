<?php

namespace Database\Seeders;

use App\Models\authors;
use Illuminate\Database\Seeder;

class authorsSeeder extends Seeder
{

    public function run()
    {
        for ($i=0; $i<15; $i++){
            authors::create([
                'nom'      =>  'Autor #' . $i
            ]);
        }
    }
}
