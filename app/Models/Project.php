<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
    protected $fillable = ['title', 'description', 'hours', 'start_date'];
    //protected $table = 'proyectos';
    // si el nombre de la tabla fuera proyectos lo definimos arriba
    static public function getLabels(){
        return __("project");
    }
}
