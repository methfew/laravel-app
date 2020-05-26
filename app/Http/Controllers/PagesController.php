<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\MainTitle;

class PagesController extends Controller
{   
    public function index(){

        $cars = Car::with('images')->orderBy('brand', 'asc')->paginate(20);
        $main_title = MainTitle::orderBy('created_at','desc')->first();
        return view('pages.index', ['cars' => $cars, 'main_title' => $main_title]);
    }
    
    
    public function contact(){
        return view('pages.contact');
    }


    

    
}
