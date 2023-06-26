<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $post = Post::inRandomOrder()->first();
            $technology_id = Technology::inRandomOrder()->first()->id;

            $post->technologies()->attach($technology_id);
        }
    }
}
