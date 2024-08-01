<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{

    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(10);
        $slug = Str::slug($title);


        return [
            'title' => $title,
            'subtitle' => $title,
            'slug' => $slug,
            'content' => $this->faker->text(),
            'author_id' => 1,
            'published_at' => now(),
            'sequence' => 1,
            'status' => 'published',
            'featured_image' => 'not-found.webp',
            'tags' => '',
            'meta_description' => $title,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
