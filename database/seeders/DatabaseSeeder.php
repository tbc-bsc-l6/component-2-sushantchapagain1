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
            'Image'=>'1641547450.jpg'
        ]);

        

        \App\Models\Product::factory(20)->create([
            'category_id' =>2,
            'Image'=>'1641547450.jpg'
        ]);

        
        \App\Models\Product::factory(20)->create([
            'category_id' =>3,
            'Image'=>'1641547450.jpg'
        ]);
    }
}