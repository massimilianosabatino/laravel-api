<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['video', 'software', 'web', 'graphics'];

        for ($i=0; $i <= count($types) - 1; $i++) { 
            $newType = new Type();
            $newType->category = $types[$i];
            $newType->slug = Str::slug($newType->category);
            $newType->save();
        }

    }
}
