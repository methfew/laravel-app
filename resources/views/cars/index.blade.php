@extends('layouts.app')
@section('description', 'AutoSami - oglasi')
@section('content')
<div class="container">
    <h1 class="my-5 text-primary">Oglasi</h1>

    @if (count($cars) >= 1)
        @foreach ($cars as $car)
            @if ($car->hidecar === false)
                

                <div class="well well-lg m-3 shadow-sm pb-3 px-3 mb-5 bg-white rounded">
                    <div class="row justify-content-around">
                      <div class="col-md-6 d-block shadow p-3 mb-3 mt-0 mt-md-4 bg-light rounded">
                        <div class="d-flex">
                            <h4 class="pl-2 my-3 mx-1 d-inline">{{$car->brand}}</a></h4>
                            <h4 class="my-3 mx-1 d-inline">{{$car->model}}</h4>
                        </div>
                        
                        <a href="/cars/{{$car->id}}"><img src="{{$car->first_image ? $car->first_image->image : ""}}" class="w-100 mb-3" alt=""></a>
                        <div class="d-flex">
                        <small class="my-3 mx-1">Oglas kreiran {{$car->created_at}}</small>  
                        </div>
                      </div>                      
                        <div class="col-md-4 text-center my-auto">
                                <div class="text-left pl-3 pt-1 mb-5">
                                    <h4>Specifikacije vozila: </h4>
                                </div>
                                <div class="text-left pl-3">
                                    <strong>oblik karoserije: </strong>
                                    <small class="pl-3">{{$car->car_body_style}}</small>
                                </div>
                                    <hr class="my-2">
                                <div class="text-left pl-3">
                                    <strong>godina proizvodnje: </strong>
                                    <small class="pl-3">{{$car->year_of_manufacture}}</small>
                                </div>
                                    <hr class="my-2">
                                <div class="text-left pl-3">
                                    <strong>broj prijeđenih Km: </strong>
                                    <small class="pl-3">{{$car->mileage}}</small>
                                </div>
                                    <hr class="my-2">
                                <div class="text-left pl-3">
                                    <strong>cijena: </strong>
                                    <small class="pl-3">{{$car->price}} €</small>
                                </div>
                                    <hr class="my-2">
                                <div class="text-left pl-3">
                                    <a href="/cars/{{$car->id}}" class="btn btn-sm btn-outline-primary mt-4">Pogledaj oglas</a>
                                </div>
                        </div>
                    </div>
                  </div>
                
            @endif
        @endforeach
        {{$cars->links()}}
    @else
            <p>Nema pronađenih oglasa.</p>
    @endif

</div>
@include('inc.footer')
@endsection