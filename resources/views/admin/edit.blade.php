@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-5">Uredi oglas</h1>



    <div>


        <form method="POST" action="{{url('dropzone/store')}}" enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        @csrf

        <input type="hidden" name="car_id" value="{{$car->id}}">
        
        </form>


    </div>
    
    <div class="my-5">
        <h5>Aktivne slike:</h5>
      <ol id="sortable" class="d-flex flex-wrap">
        @foreach ($car->images as $image)

        <td>  
        <li class="ui-state-default m-2 p-2 bg-white rounded" data-image-id="{{ $image->id }}">
            <img class="editimg rounded" src="{{$image->image}}">
            <a href="/erase/{{ $image->id }}" class="btn btn-outline-danger btn-sm m-3">Obriši</a></li>
        </td>               
      @endforeach
        
        
      </ol>

    </div>
    
    {!! Form::open(['action' => ['AdminController@update', $car->id], 'method' => 'POST', 'files' => true]) !!}
    <div class="form-group well well-lg m-3 shadow-sm p-5 my-5 bg-white rounded">
        <div class="row justify-content-around">
            <div class="col-md-4 shadow p-3 mb-3 bg-light rounded">

                <div>
                {{Form::label('brand', 'Marka vozila', ['class'=> 'text-dark pt-2'])}}
                {{Form::text('brand', $car->brand, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('brand') }}</span>
                </div>
                
                <div>
                {{Form::label('model', 'Model vozila', ['class'=> 'text-dark pt-2'])}}
                {{Form::text('model', $car->model, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('model') }}</span>
                </div>

                <div>
                {{Form::label('price', 'Cijena (€)', ['class'=> 'text-dark pt-2'])}}
                {{Form::number('price', $car->price, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('price') }}</span>
                </div>

                <div>
                {{Form::label('car_body_style', 'Oblik karoserije', ['class'=> 'text-dark pt-2'])}}
                {{Form::select('car_body_style',['coupe' => 'coupe', 'limuzina' => 'limuzina', 'karavan' => 'karavan', 'terensko vozilo - SUV' => 'terensko vozilo - SUV', 'kabriolet' => 'kabriolet', 'monovolumen' => 'monovolumen', 'kombibus' => 'kombibus'], $car->car_body_style, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('car_body_style') }}</span>
                </div>

                <div>
                {{Form::label('mileage', 'Broj prijeđenih Km', ['class'=> 'text-dark pt-2'])}}
                {{Form::number('mileage', $car->mileage, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('mileage') }}</span>
                </div>

                <div>
                {{Form::label('number_of_doors', 'Broj vrata', ['class'=> 'text-dark pt-2'])}}
                {{Form::select('number_of_doors',['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], $car->number_of_doors, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('number_of_doors') }}</span>
                </div>

                <div>
                {{Form::label('number_of_seats', 'Broj sjedala', ['class'=> 'text-dark pt-2'])}}
                {{Form::select('number_of_seats',['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9'] , $car->number_of_seats, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('number_of_seats') }}</span>
                </div>

                <div>
                {{Form::label('color', 'Boja', ['class'=> 'text-dark pt-2'])}}
                {{Form::text('color', $car->color, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('color') }}</span>
                </div>

                <div>
                {{Form::label('year_of_manufacture', 'Godina proizvodnje', ['class'=> 'text-dark pt-2'])}}
                {{Form::text('year_of_manufacture', $car->year_of_manufacture, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('year_of_manufacture') }}</span>
                </div>

            </div>
            <div class="col-md-6 d-block shadow p-3 my-auto bg-light rounded">
                

                
                {{Form::label('description', 'Opis vozila', ['class'=> 'text-dark pt-2'])}}
                {{Form::textarea('description', $car->description, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('description') }}</span>

                <div class="d-flex mt-4">

                {{Form::label('favorite', 'Istaknuti oglas', ['class'=> 'text-dark pt-2 d-inline'])}}
                {{Form::checkbox('favorite', null, $car->favorite, ["class"=> 'form-control mt-2'])}}
                                
                {{Form::label('hidecar', 'Sakriti oglas', ['class'=> 'text-dark pt-2 d-inline'])}}
                {{Form::checkbox('hidecar', null, $car->hidecar,["class"=> 'form-control mt-2'])}}

                </div>
            </div>

            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-outline-secondary mt-5 ml-3" href="/admin" role="button">Cancel</a>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class'=>'btn btn-outline-success mt-5'])}}
            </div>
    </div>
    {!! Form::close() !!}


</div>
@endsection