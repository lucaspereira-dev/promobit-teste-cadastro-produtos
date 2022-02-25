<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Tag;
use App\Models\ProductTag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\ProductTag::factory(10)->create();
    }
}
