<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->text();
            $newPost->slug = Str::of($newPost->title)->slug();
            $newPost->author = $faker->name();
            $newPost->content = $faker->realText();
            $newPost->save();
        }
    }
}
