<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['php', 'html', 'css', 'javascript', 'after effect', 'davinci resolve', 'adobe premiere', 'davinci fusion', 'adobe photoshop', 'adobe illustrator', 'adobe indesign'];

        for ($i=0; $i <= count($technologies) - 1; $i++) { 
            $newTec = new Technology();
            $newTec->technology = $technologies[$i];
            $newTec->slug = Str::slug($newTec->technology);
            $newTec->save();
        }
    }
}
