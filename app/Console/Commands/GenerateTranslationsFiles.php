<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateTranslationsFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:file-translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un fichero en cada directorio dentro de lang para cada recurso';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //obtengo los recursos de mi fichero
        $resources = config('resources');
        $langs = config('langs');

        foreach($langs as $lang=>$data){
            foreach ($resources as $resource=>$data ) {
                $content = $this->getContentFileTranslations
                }
            $field_path = lang_path("$lang/$resource.php");
            file_put_contents($field_path, $content);
        }
    }
    private function getContentFileTranslations($resource){
        //TODO ---->>>>>>>
    }

}
