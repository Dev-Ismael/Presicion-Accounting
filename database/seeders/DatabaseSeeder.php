<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('a.ismael@bluskyint.com'),
            'is_admin' => '1',
        ]);

        \App\Models\Article::factory()->create([
            'title' => 'title',
            'slug' => 'slug',
            'content' => 'content',
            'seo_description' => 'seo_description',
            'seo_keywords' => 'seo_keywords',
            'author' => 'author',
            'category' => 'category',
            'img' => 'img',
        ]);

        \App\Models\Resource::factory()->create([
            'title' => 'title',
            'content' => 'content',
            'img' => 'img',
        ]);

        \App\Models\Member::factory()->create([
            'name' => 'ismael',
            'job_title' => 'job_title',
            'address' => 'address',
            'img' => 'img',
        ]);


        \App\Models\TaxCenter::factory()->create([
            'title' => 'title',
            'content' => 'content',
            'img' => 'img',
        ]);


        \App\Models\Service::factory()->create([
            'title' => 'title',
            'slug' => 'slug',
            'parent_id' => 1,
            'content' => 'content',
            'img' => 'img',
        ]);


        \App\Models\Testimonial::factory()->create([
            'name' => 'Ahmed',
            'job_title' => 'web developer',
            'content' => 'precision fantastic company',
            'img' => 'img',
        ]);

    }
}
