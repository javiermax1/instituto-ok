<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class GenerateModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear modelos, factories y seeder a partir del fichero config resources.php';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $resources = config('resources');
        foreach ($resources as $resource=>$data) {
            if (isset($data['role']))
                continue;
            $model = Str::studly( Str::singular($resource));
            $this->call('make:model',
                ['name' => $model,
                    '--migration' => true,
                    '--factory' => true,
                    '--seed' => true,
                ]
            );

            //Consigo la información que quiero añadir

            $fillable = $this->getStringFillable($data['fields']);
            $getFields = $this->getStringGetFields($resource);

            //necesito la ubicación completa del fichero del modelo que quiero modificar
            $modelPath=app_path("Models/$model.php");

            $this->getContentFileModel($modelPath, $fillable, $getFields );


            //php artisan make:model $resource -fms
        }
        $this->info('Modelos generados');
        //
    }
    /**
     * @param  $fields = 'fields'=>['name','description','priority','status']
     * ,
     * @return " protected $fillable = ['name','description','priority','status']
     *
     */

    private function getStringFillable(array $fields){
        $fillable = implode("', '", $fields);


        $fillable = "\tprotected \$fillable = ['$fillable'];\n";

        return $fillable;

    }
    private function getStringGetFields(string $resource){
        $function =<<<FIN
        public static function getFields(){
            return "__($resource.fields)";
        }
FIN;
        return $function;
    }
    private function getContentFileModel(string $modelPath, string $fillable, string $getFields){
        //Tomamos el contenido completo del fichero
        //remplazamos la palabra HasFactory; por HasFactory; $fillable $getFields
        //Escribimo de nuevo en el ficheor en nuevo contenido
        $content = file_get_contents($modelPath);
        $search= "use HasFactory;";
        $replace = "use HasFactory;\n\n  $fillable\n  $getFields";
        $content = str_replace($search, $replace, $content);
        file_put_contents($modelPath, $content);




    }


}
