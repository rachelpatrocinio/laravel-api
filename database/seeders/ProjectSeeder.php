<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    
    public function run(Faker $faker): void
    {
        // DB::table('projects')->truncate();
        $types = Type::all();
        $types_ids = $types->pluck('id')->all();
        $technologies_ids = Technology::all()->pluck('id')->all();

        for($i = 0; $i < 10; $i++){
            $new_project = new Project();
            
            $titles = ['laravel auth', 'laravel crud', 'laravel intro', 'laravel migration seeder', 'laravel preset', 'laravel model controller', 'laravel assets', 'php', 'php intro', 'php laravel'];
            
            $new_project->project_title = $faker->randomElement($titles);
            $new_project->slug = Str::slug($new_project->project_title);
            $new_project->project_description = $faker->text();        
            $new_project->github_url = $faker->url();
            $new_project->type_id = $faker->randomElement($types_ids);
            $new_project->save();   

        
            $random_technologies_ids = $faker->randomElements($technologies_ids, 2);
            $new_project->technologies()->attach($random_technologies_ids);
        }   
    }
}
