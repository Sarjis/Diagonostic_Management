<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
//        factory(App\Pranker::class,10)->create();
//        factory(App\Post::class,10)->create();
//        factory(App\Category::class,10)->create();
//        factory(App\Phone::class,10)->create();

        factory(\App\Test::class,10)->create();
        factory(\App\TestType::class,10)->create();
        factory(\App\TestRequest::class,10)->create();
    }
}
