<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //$this->call([StudentSeeder::class]);
        // aquí finalmente definimos los que el seeder debe de crear
        // php
        // php artisan migrate:fresh --seed
        $this->call([
            RolSeeders::class,
            ProjectSeeder::class,
            UserSeeders::class,
           ]);

    }
}
