<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Type;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50 ; $i++) {
            $new_post = new Post();
            $new_post->name = $faker->sentence();
            $new_post->type_id = Type::InRandomOrder()->first()->id;
            $new_post->slug = Post::generateSlug($new_post->name);
            $new_post->description = $faker->text();
            $new_post->start = $faker->date('Y-m-d');
            $new_post->end = $faker->date('Y-m-d');
            $new_post->save();
        }
    }
}
