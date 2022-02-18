<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);

        $roles = Role::all();

        $users =  User::factory(50)->create()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(1)->pluck('id')
            );
        });

        $articles = \App\Models\Article::factory()
            ->count(40)
            ->state(new Sequence(
                fn ($sequence) => ['user_id' => $users->random()->id],
            ))
            ->create();
    }
}
