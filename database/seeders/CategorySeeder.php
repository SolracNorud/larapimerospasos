<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        for ($i=0; $i < 20 ; $i++) { 
            Category::create([
                'title' => "Categoria $i",
                'slug' => "categoria-$i"
            ]);
        }
    }
}
