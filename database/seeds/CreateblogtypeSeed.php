<?php

use Illuminate\Database\Seeder;
use App\BlogpostType;

class CreateblogtypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $BlogpostType=BlogpostType::create([
     	'name'        => 'World',
     	'slug'        => 'world',
     	'description' => 'World'
        ]);
        $BlogpostType=BlogpostType::create([
     	'name'        => 'Technology',
     	'slug'        => 'technology',
     	'description' => 'Technology'
        ]);
        $BlogpostType=BlogpostType::create([
     	'name'        => 'Design',
     	'slug'        => 'design',
     	'description' => 'Design'
        ]);

        $BlogpostType=BlogpostType::create([
     	'name'        => 'Culture',
     	'slug'        => 'culture',
     	'description' => 'Culture'
        ]);
        $BlogpostType=BlogpostType::create([
     	'name'        => 'Business',
     	'slug'        => 'business',
     	'description' => 'Business'
        ]);
        $BlogpostType=BlogpostType::create([
     	'name'        => 'Politics',
     	'slug'        => 'politics',
     	'description' => 'Politics'
        ]);
        $BlogpostType=BlogpostType::create([
     	'name'        => 'Opinion',
     	'slug'        => 'opinion',
     	'description' => 'Opinion'
        ]);
        $BlogpostType=BlogpostType::create([
     	'name'        => 'Science',
     	'slug'        => 'science',
     	'description' => 'Science'
        ]);
        $BlogpostType=BlogpostType::create([
     	'name'        => 'Health',
     	'slug'        => 'health',
     	'description' => 'Health'
        ]);
		$BlogpostType=BlogpostType::create([
     	'name'        => 'Style',
     	'slug'        => 'style',
     	'description' => 'Style'
        ]);
    }
}
 