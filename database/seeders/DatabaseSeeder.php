<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Category::factory()->count(20)->create();
        $tags = Tag::factory()->count(20)->create();
       $posts = Post::factory()->count(200)->create();


        foreach ($posts as $post) {
            //Запрашивается 5 рандомных тегов random 5 и берутся только их id из за  pluck
            $tagIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagIds);
            }
    }
}
