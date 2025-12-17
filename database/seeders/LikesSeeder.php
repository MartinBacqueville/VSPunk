<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use App\Models\Voyage;
use Faker\Factory;
use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('fr_FR');

        $articles = Article::all();
        $userIds = User::pluck('id')->toArray();

        foreach ($articles as $article) {
            $nbLikes = $faker->numberBetween(2, 9);
            $usersSelected = $faker->randomElements($userIds, $nbLikes);

            foreach ($usersSelected as $id) {
                $article->likes()->attach($id, [
                    'nature' => $faker->randomElement(['like', 'dislike']),
                ]);
            }
        }
    }
}