<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blading extends Controller
{

    public function index(){
        return view("Blading.1st_Page");   
    }

    
    public function index2(){
        return view("Blading.2nd_Page");   
    }
}
