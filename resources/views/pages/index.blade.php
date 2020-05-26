@extends('layouts.app')
@section('title')
@section('description', 'AutoSami - veliki izbor rabljenih automobila svih kategorija.')
@section('keywords', 'auto, prodaja auta, rabljeni auti, auto prodaja, autosami, auto sami')
@section('content')
        <div class="jumbotron jumbotron-fluid align-items-center" id="hero">
            <div class="row h-100 hero-div">
                <div class="div-content col-lg-12 col-md-12 text-center text-light my-auto">
                <h1 class="hero-title text-left">AutoSami</h1>
                <p class="lead text-left mt-5 text-dark">{{$main_title->main_title}}
                </p>            
                <p class="lead text-left">
                <a class="btn btn-outline-dark btn-lg mt-3" href="/cars" role="button">Pogledaj oglase</a>            
                </p>
                </div>
            </div>
        </div>

        


            <link href="{{ asset('css/style.css') }}" rel="stylesheet">
            <div class="album py-5 bg-light">
                <div class="container">
                                
                            <div class="text-center text-dark my-3"><h3 class="text-primary">Istaknuti oglasi</h3></div>
                            <div class="row">
                                @if (count($cars) >= 1) 
                                    @foreach ($cars as $car)
                                        @if ($car->favorite === true)
                                        @if ($car->hidecar === false)
                                                                                                                        
                                            <div class="card shadow ad-width p-2 mb-3 mx-3 bg-light rounded">
                                                <div id="carsCarousel{{$car->id}}" class="carousel slide w-100" data-ride="carousel">
                                                                                
                                                    <div class="carousel-inner">
                                                        @foreach ($car->images as $image)
                                                      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                        <img class="d-block w-100" src="{{ $image->image }}" alt="Slide image">
                                                      </div>
                                                      @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carsCarousel{{$car->id}}" role="button" data-slide="prev">
                                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                      <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carsCarousel{{$car->id}}" role="button" data-slide="next">
                                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                      <span class="sr-only">Next</span>
                                                    </a>
                                                  </div>
                                              <div class="card-body">
                                                <h5 class="card-title">{{$car->brand}} {{$car->model}}</h5>
                                                <p class="card-text">cijena vozila: {{$car->price}} €</p>
                                                <a href="/cars/{{$car->id}}" class="btn btn-sm btn-outline-primary">Pogledaj oglas</a>
                                              </div>
                                            </div>
                                        
                                        @endif
                                        @endif
                                    @endforeach
                                    {{$cars->links()}}
                                @else
                                        <p>Nema pronađenih oglasa.</p>
                                @endif
                                                            
                            </div>


                </div>
            </div>
            


            @include('inc.footer')


@endsection
        

