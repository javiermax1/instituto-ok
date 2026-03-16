<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "name" => "admin",
            "email" => "a@a.com",
            "password" => bcrypt('password')
        ]);

        $user->assignRole('admin');
        User::factory()->count(50)->create()->each(function ($user) {
            $user->department = Arr::random(config('departments'));
            $user->save();
            $user->assignRole('teacher');
        });

        User::factory()->count(50)->create()->each(function ($user) {
            $user->assignRole('student');

        });
        User::factory()->count(50)->create()->each(function ($user) {
            $user->assignRole('registered');

        });
    }
}
