<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        

        for ($i=0; $i < 40 ; $i++) {
            $title = Str::random(25); 
            $c = Category::inRandomOrder()->first();
            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, dolorum blanditiis repudiandae vitae suscipit corrupti veniam nam cumque maxime a quis quos, eos ut necessitatibus explicabo ad error consectetur. Magni.</p>",
                'category_id' => $c->id,
                'description' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>",
                'posted' => 'yes'
            ]);
        }
    }
}
