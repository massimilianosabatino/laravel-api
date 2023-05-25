<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $category = Type::inRandomOrder()->first();
            $newProject = new Project();
            $newProject->title = $faker->sentence(4);
            $newProject->cover = $faker->imageUrl(700,400,null);
            $newProject->description = $faker->paragraph();
            $newProject->type_id = $category['id'];
            $newProject->link = $faker->url();
            $newProject->client = $faker->company();
            $newProject->slug = Str::slug($newProject->title, '-'); 
            $newProject->private = $faker->boolean();
            $newProject->save();
        }
    }
}
