<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Frontend',
            'Backend',
            'Fullstack',
            'Wordpress',
            'PrestaShop'
        ];

        foreach ($types as $project_type){
            $new_type = new Type();
            $new_type->name = $project_type;
            $new_type->slug = Str::slug($project_type, '-');
            $new_type->save();
        }
    }
}
