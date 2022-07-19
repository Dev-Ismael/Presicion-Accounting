<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'abdulrahman ismael',
            'email' => 'a.ismael@bluskyint.com',
            'password' => 'a.ismael@bluskyint.com',
            'is_admin' => '1',
        ]);

        \App\Models\Article::factory()->create([
            'title' => 'title',
            'content' => 'content',
            'seo_description' => 'seo_description',
            'seo_keywords' => 'seo_keywords',
            'author' => 'author',
            'category' => 'category',
            'img' => 'img',
        ]);

    }
}
