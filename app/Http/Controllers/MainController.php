<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

//        return "<h1>Estoy en main</h1>";
        return view("main");
    }

    //
}
