<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Car;
use App\MainTitle;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $cars = Car::orderBy('created_at','desc')->paginate(10); 
        $main_titles = MainTitle::orderBy('created_at','desc')->get();       
        return view('/admin.index', ['cars' => $cars, 'main_titles' => $main_titles]);
    }


    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param Car $car
     * @return
     */
    public function store(Request $request)
    {
        \Log::info($request->all());
        $this->validate($request, [
            'files.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required',
            'car_body_style' => 'required',
            'mileage' => 'required',
            'number_of_doors' => 'required',
            'number_of_seats' => 'required',
            'color' => 'required',
            'year_of_manufacture' => 'required',
            'description' => 'required'
        ]);
            

        $car = new Car;
        $car->image = null;
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->price = $request->input('price');
        $car->car_body_style = $request->input('car_body_style');
        $car->mileage = $request->input('mileage');
        $car->number_of_doors = $request->input('number_of_doors');
        $car->number_of_seats = $request->input('number_of_seats');
        $car->color = $request->input('color');
        $car->year_of_manufacture = $request->input('year_of_manufacture');
        $car->description = $request->input('description');
        $car->view_count = 0;
        $car->favorite = $request->input('favorite') ?? false;
        $car->hidecar = $request->input('hidecar') ?? false;
        $car->user_id = auth()->user()->id;
        $car->save();
        

        

        return redirect('/admin')->with('Success', 'Novi oglas je uspješno stvoren.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response$car->images 
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $car->images = $car->images->sortBy(function($image)
        {
            return $image->sortable_index;
        });
        return view('admin.edit')->with('car', $car);
    }


    public function change_position(Request $request)
    {
        $position=$request->positions;
        foreach($position as $p)
        {

            Image::where('id',$p['image_id'])->update(['sortable_index'=>$p['index']]);
        }
        return "success";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'files.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required',
            'car_body_style' => 'required',
            'mileage' => 'required',
            'number_of_doors' => 'required',
            'number_of_seats' => 'required',
            'color' => 'required',
            'year_of_manufacture' => 'required',
            'description' => 'required'
        ]);

        $car = Car::find($id);
        $car->image = null;
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->price = $request->input('price');
        $car->car_body_style = $request->input('car_body_style');
        $car->mileage = $request->input('mileage');
        $car->number_of_doors = $request->input('number_of_doors');
        $car->number_of_seats = $request->input('number_of_seats');
        $car->color = $request->input('color');
        $car->year_of_manufacture = $request->input('year_of_manufacture');
        $car->description = $request->input('description');
        $car->favorite = $request->input('favorite') ?? false;
        $car->hidecar = $request->input('hidecar') ?? false;
        $car->save();
        

        return redirect('/admin')->with('Success', 'Oglas je uspješno promijenjen.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);


        $car->images()->delete();
        $car->delete();
        return redirect('/admin')->with('success', 'Oglas uklonjen');
    }


    function getAllMonths() {

        $month_array = array();
        $cars_dates = Car::orderBy('created_at', 'asc')->pluck('created_at');

        if (!empty($cars_dates)){
            foreach($cars_dates as $unformatted_date) {
                $date = new \DateTime($unformatted_date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_no] = $month_name;
            }
        }
        return $month_array;
    }

    function getMonthlyCarCount($month) {
        $monthly_car_count = Car::whereMonth('created_at', $month)->get()->count();
        return $monthly_car_count;

    }

    function getMonthlyCarData() {
             

        $monthly_car_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if(!empty($month_array)){
            foreach($month_array as $month_no => $month_name){
                $monthly_car_count = $this->getMonthlyCarCount($month_no);
                array_push($monthly_car_count_array, $monthly_car_count);
                array_push($month_name_array, $month_name);
            }
        }

        $max_no = max($monthly_car_count_array);
        $max = round(($max_no + 10/2) / 10) * 10;
        $month_array = $this->getAllMonths();
        $monthly_car_data_array = array(
            'months' => $month_name_array,
            'car_count_data' => $monthly_car_count_array,
            'max' => $max,
        );
        return $monthly_car_data_array;
    }
}
