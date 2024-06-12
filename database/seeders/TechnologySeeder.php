<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = [
        [
            'name'=>'html',
            'thumb' => 'html-5.png',
            'description' => "HTML (HyperText Markup Language) is the most basic building block of the Web. It defines the meaning and structure of web content. Other technologies besides HTML are generally used to describe a web page's appearance/presentation (CSS) or functionality/behavior (JavaScript)."
        ],
        [
            'name'=>'css',
            'thumb' => 'css-3.png',
            'description' => "Cascading Style Sheets (CSS) is a stylesheet language used to describe the presentation of a document written in HTML or XML (including XML dialects such as SVG, MathML or XHTML). CSS describes how elements should be rendered on screen, on paper, in speech, or on other media."
        ],
        [
            'name'=>'js',
            'thumb' => 'js.png',
            'description' => "JavaScript is a scripting or programming language that allows you to implement complex features on web pages — every time a web page does more than just sit there and display static information for you to look at — displaying timely content updates, interactive maps, animated 2D/3D graphics, scrolling video jukeboxes, etc. — you can bet that JavaScript is probably involved. It is the third layer of the layer cake of standard web technologies, two of which (HTML and CSS) we have covered in much more detail in other parts of the Learning Area."
        ],
        [
            'name'=>'vue',
            'thumb' => 'vue.png',
            'description' => "Vue is a JavaScript framework for building user interfaces. It builds on top of standard HTML, CSS, and JavaScript and provides a declarative, component-based programming model that helps you efficiently develop user interfaces of any complexity."
        ],
        [
            'name'=>'php',
            'thumb' => 'php.png',
            'description' => "The term PHP is an acronym for – Hypertext Preprocessor. PHP is a server-side scripting language designed specifically for web development. It is open-source which means it is free to download and use. It is very simple to learn and use. The file extension of PHP is “.php”. PHP was introduced by Rasmus Lerdorf in the first version and participated in the later versions. It is an interpreted language and it does not require a compiler. "
        ],
        [
            'name'=>'laravel',
            'thumb' => 'laravel.png',
            'description' => "Laravel is a free and open-source PHP-based web framework for building high-end web applications. It was created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony."
        ],
        [
            'name'=>'mysql',
            'thumb' => 'mysql.png',
            'description' => "MySQL is a relational database management system. Databases are the essential data repository for all software applications. For example, whenever someone conducts a web search, logs in to an account, or completes a transaction, a database system is storing the information so it can be accessed in the future."
        ],
       
    ];
        foreach($technologies as $technology){
            $new_technology = new Technology();
            $new_technology->name = $technology['name'];
            $new_technology->description = $technology['description'];
            $new_technology->thumb = $technology['thumb'];
            $new_technology->save();
        }
    }
}
