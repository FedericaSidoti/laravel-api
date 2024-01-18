<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title'=> 'Boolando',
                'description' => 'Lorem Ipsum'
            ],

            [
                'title'=> 'Boolzapp',
                'description' => 'Lorem Ipsum'
            ],

            [
                'title'=> 'ToBoolist',
                'description' => 'Lorem Ipsum'
            ],
            [
                'title'=> 'BoolPress',
                'description' => 'Lorem Ipsum'
            ],
            [
                'title'=> 'Campo Boolfiorito',
                'description' => 'Lorem Ipsum'
            ],
            [
                'title'=> 'Midterm Project',
                'description' => 'Lorem Ipsum'
            ],
            [
                'title'=> 'Laravel Auth',
                'description' => 'Lorem Ipsum'
            ]
        ];

        $types = Type::all(); 
        $ids = $types->pluck('id');

        $technologies= Technology::all();
        $techIds = $technologies->pluck('id');

        foreach($projects as $project){
            $newProject = new Project(); 
            $newProject->title = $project['title'];
            $newProject->description = $project['description'];
            $newProject->slug = Str::slug($project['title']);
            $newProject->type_id= $ids->random();

            
            $newProject->save();

            $newProject->technologies()->attach(
                $techIds->random(rand(1, 10))->all()
            );

        }    
    }
}
