@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-5">Napravi novi oglas</h1>


    
    

    {!! Form::open(['action' => 'AdminController@store', 'method' => 'POST', 'files' => true]) !!}  <!-- enctype="multipart/form-data" -->
    <div class="form-group well well-lg m-3 shadow-sm p-5 my-5 bg-white rounded">
        <div class="row justify-content-around">
            <div class="col-md-4 shadow p-3 mb-3 bg-light rounded">

                <div>
                {{Form::label('brand', 'Marka vozila', ['class'=> 'text-dark pt-2'])}}
                {{Form::text('brand', null, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('brand') }}</span>
                </div>

                <div>
                {{Form::label('model', 'Model vozila', ['class'=> 'text-dark pt-2'])}}
                {{Form::text('model', null, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('model') }}</span>
                </div>

                <div>
                {{Form::label('price', 'Cijena (€)', ['class'=> 'text-dark pt-2'])}}
                {{Form::number('price', null, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('price') }}</span>
                </div>

                <div>
                {{Form::label('car_body_style', 'Oblik karoserije', ['class'=> 'text-dark pt-2'])}}
                {{Form::select('car_body_style',['coupe' => 'coupe', 'limuzina' => 'limuzina', 'karavan' => 'karavan', 'terensko vozilo - SUV' => 'terensko vozilo - SUV', 'kabriolet' => 'kabriolet', 'monovolumen' => 'monovolumen', 'kombibus' => 'kombibus'], null, ["class"=> 'form-control', 'placeholder' => 'odaberite..'])}}
                <span class="text-danger">{{ $errors->first('car_body_style') }}</span>
                </div>

                <div>
                {{Form::label('mileage', 'Broj prijeđenih Km', ['class'=> 'text-dark pt-2'])}}
                {{Form::number('mileage', null, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('mileage') }}</span>
                </div>

                <div>
                {{Form::label('number_of_doors', 'Broj vrata', ['class'=> 'text-dark pt-2'])}}
                {{Form::select('number_of_doors',['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], null, ["class"=> 'form-control', 'placeholder' => 'odaberite..'])}}
                <span class="text-danger">{{ $errors->first('number_of_doors') }}</span>
                </div>

                <div>
                {{Form::label('number_of_seats', 'Broj sjedala', ['class'=> 'text-dark pt-2'])}}
                {{Form::select('number_of_seats',['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9'] , null, ["class"=> 'form-control', 'placeholder' => 'odaberite..'])}}
                <span class="text-danger">{{ $errors->first('number_of_seats') }}</span>
                </div>

                <div>
                {{Form::label('color', 'Boja', ['class'=> 'text-dark pt-2'])}}
                {{Form::text('color', null, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('color') }}</span>
                </div>

                <div>
                {{Form::label('year_of_manufacture', 'Godina proizvodnje', ['class'=> 'text-dark pt-2'])}}
                {{Form::text('year_of_manufacture', null, ["class"=> 'form-control'])}}
                <span class="text-danger">{{ $errors->first('year_of_manufacture') }}</span>
                </div>

                

            </div>
            <div class="col-md-6 d-block shadow p-3 my-auto bg-light rounded">
                

                

                
                {{Form::label('description', 'Opis vozila', ['class'=> 'text-dark pt-2'])}}

                <div id="editor">
                </div>
                <input type="text" id="description" name="description" hidden>
                {{-- {{Form::textarea('description', null, ["class"=> 'form-control'])}} --}}

                <span class="text-danger">{{ $errors->first('description') }}</span>

                
                <div class="d-flex align-middle mt-4">
                    {{Form::label('favorite', 'Istaknuti oglas', ['class'=> 'text-dark pt-2 d-inline'])}}
                    {{Form::checkbox('favorite', null, false, ["class"=> 'form-control mt-2'])}}
    
                    
    
                    {{Form::label('hidecar', 'Sakriti oglas', ['class'=> 'text-dark pt-2 d-inline'])}}
                    {{Form::checkbox('hidecar', null, false, ["class"=> 'form-control mt-2'])}}                                            
                </div>
                                

            </div>

                
        </div>
        <div class="d-flex justify-content-between">  
            <a class="btn btn-outline-secondary mt-5 ml-3" href="/admin" role="button">Cancel</a>                  
            {{Form::submit('Submit', ['class'=>'btn btn-outline-primary mt-5'])}}
        </div>
        

    </div>
    {!! Form::close() !!}
    


</div>
@endsection