<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type; 
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Front End', 'Back End', 'DevOp', 'Design', 'Full Stack'] ; 

        foreach($types as $type) {
            $new_type = new Type() ; 
            $new_type->name = $type; 
            $new_type->slug = Str::slug($new_type->name);

            $new_type->save();

        }
    }
}
