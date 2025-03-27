<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'title' => fake()->sentence(),
        'slug' => fake()->slug(),
        'photo' => fake()->imageUrl(200, 200),
        'auteur' => fake()->name(),
        'content' => fake()->paragraphs(3, true)
    ];
}


}
