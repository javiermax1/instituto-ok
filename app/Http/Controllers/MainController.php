<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $nombre = "Javier";
        $numero = rand(1,100);
//        return "<h1>Estoy en main</h1>";
        return view("main",["nombre"=>$nombre, "numero"=>$numero]);
    }

    //
}
