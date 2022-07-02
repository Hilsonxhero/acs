<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $articles = \App\Models\Article::factory()
            ->count(40)
            ->state(new Sequence(
                fn ($sequence) => ['user_id' => $users->random()->id],
            ))
            ->create();
    }
}
