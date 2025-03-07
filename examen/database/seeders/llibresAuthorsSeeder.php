<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class llibresAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('author_llibre')->insert([
            ['llibre_id' => 1, 'author_id' => 1],
            ['llibre_id' => 1, 'author_id' => 2],
            ['llibre_id' => 2, 'author_id' => 3],
            ['llibre_id' => 2, 'author_id' => 4],
            ['llibre_id' => 2, 'author_id' => 5],
        ]);
    }
}
