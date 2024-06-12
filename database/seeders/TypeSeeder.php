<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        // DB::table('types')->truncate();
        $types = [
            [ 
                'name' => 'FrontEnd',
                'description' => "A Front-End Web Developer is a tech industry professional who builds the front portion of websites that customers, guests, or clients use on a daily basis."
            ],
            [ 
                'name' => 'Backend',
                'description' => "Back-end developers are the experts who build and maintain the mechanisms that process data and perform actions on websites. Unlike front-end developers, who control everything you can see on a website, back-end developers are involved in data storage, security, and other server-side functions that you cannot see."
            ],
            [ 
                'name' => 'FullStack',
                'description' => "A full-stack developer is a developer or engineer who can build both the front end and the back end of a website. The front end (the parts of a website a user sees and interacts with) and the back end (the behind-the-scenes data storage and processing) require different skill sets."
            ],
            [ 
                'name' => 'Design',
                'description' => "Web design and development is an umbrella term that describes the process of creating a website. Like the name suggests, it involves two major skill sets: web design and web development. Web design determines the look and feel of a website, while web development determines how it functions."
            ],
            [ 
                'name' => 'DevOps',
                'description' => "DevOps is the combination of cultural philosophies, practices, and tools that increases an organization's ability to deliver applications and services at high velocity: evolving and improving products at a faster pace than organizations using traditional software development and infrastructure management processes."
            ]
        ];
        foreach($types as $type){
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->description = $type['description'];
            $new_type->save();
        }
    }
}
