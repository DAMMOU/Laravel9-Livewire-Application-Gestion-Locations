<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nom" => $this->faker->lastName,
            "noSerie" => $this->faker->swiftBicNumber,
            "estDisponible" => rand(0, 1),
            "imageUrl" => $this->faker->imageUrl(),
            "type_article_id" => rand(1, 4)  
        ];
    }
}
