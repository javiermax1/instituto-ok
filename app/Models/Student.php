<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // desciende de la clase factory (herencia)
    use HasFactory;
    protected $fillable = ['name', 'age', 'email', 'dni'];

    static public function getLabels(){
        return __("student");
    }

}
