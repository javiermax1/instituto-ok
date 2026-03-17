<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;



class GenerateModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // signature: es el comando: php artisan generate:models
    protected $signature = 'generate:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear modelos , factorias y seeder a partir del fichero config/resources.php';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $resources = config('resources');
        foreach ($resources as $resource=>$data) {
            if (isset($data['role']))
                continue;
            $model = Str::studly(Str::singular($resource));
            // El comando que quiero crear: //php artisan make:model $resource -fms
            $this->call('make:model', ['name' => $model,
                    '--migration' => true,
                    '--factory' => true,
                    '--seed' => true,]
            );
        }
        $this->info('Modelos generados');
    }
}
