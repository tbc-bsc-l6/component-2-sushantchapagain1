<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        \App\Models\Product::factory(20)->create([
            'category_id' =>1,
            'Image'=>'books.png'
        ]);

        

        \App\Models\Product::factory(20)->create([
            'category_id' =>2,
            'Image'=>'cd.png'
        ]);

        
        \App\Models\Product::factory(20)->create([
            'category_id' =>3,
            'Image'=>'fifa.png'
        ]);
    }
}