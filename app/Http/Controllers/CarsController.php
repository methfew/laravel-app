<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdView;
use App\Car;

class CarsController extends Controller
{   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $cars = Car::with('images')->orderBy('brand', 'asc')->paginate(10);
        return view('cars.index')->with('cars', $cars);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        $car->increment('view_count');
        return view('cars.show')->with('car', $car);
    }



}
