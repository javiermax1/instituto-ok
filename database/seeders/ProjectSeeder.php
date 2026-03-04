<?php
// namespace de la clase Seeders
namespace Database\Seeders;

// namespaces dentro de la clase Project
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        php artisan make:
        Project::factory()->count(100)->create();
    }
}
