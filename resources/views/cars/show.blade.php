@extends('layouts.app')
@section('content')
<div class="container-fluid">
    

    <div class="well well-lg m-3 shadow-sm pb-3 px-3 mb-5 bg-white rounded">
        <div class="row justify-content-around">

            <div class="col-lg-5 d-block shadow p-3 mb-3 bg-light rounded">




              <div id="carsCarousel" class="carousel slide w-100" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($car->images as $image)
                    <li data-target="#carsCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <div class="carousel-inner">
                    @foreach ($car->images as $image)
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ $image->image }}" alt="Slide image">
                  </div>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carsCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carsCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>



            </div>
            <div class="col-lg-5 p-3 text-center my-auto">
                <div class="row">
                    <div class="col">
                        <div class="text-left pl-3 mt-3">
                            <strong>Marka: </strong>
                            <small class="pl-3">{{$car->brand}}</small>
                        </div>
                            <hr class="my-2">
                        <div class="text-left pl-3">
                            <strong>Model: </strong>
                            <small class="pl-3">{{$car->model}}</small>
                        </div>
                            <hr class="my-2">
                        <div class="text-left pl-3">
                            <strong>Oblik karoserije: </strong>
                            <small class="pl-3">{{$car->car_body_style}}</small>
                        </div>
                            <hr class="my-2">
                    </div>

                    <div class="col">
                        <div class="text-left pl-3 mt-3">
                            <strong>Broj prijeđenih Km: </strong>
                            <small class="pl-3">{{$car->mileage}}</small>
                        </div>
                            <hr class="my-2">
                        <div class="text-left pl-3">
                            <strong>Broj vrata: </strong>
                            <small class="pl-3">{{$car->number_of_doors}}</small>
                        </div>
                            <hr class="my-2">
                        <div class="text-left pl-3">
                            <strong>Boja: </strong>
                            <small class="pl-3">{{$car->color}}</small>
                        </div>
                            <hr class="my-2">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="text-left pl-3">
                            <strong>Godina proizvodnje: </strong>
                            <small class="pl-3">{{$car->year_of_manufacture}}</small>
                        </div>
                            <hr class="my-2">
                    </div>

                    <div class="col">
                        <div class="text-left pl-3">
                            <strong>Cijena: </strong>
                            <small class="pl-3">{{$car->price}} €</small>
                        </div>
                            <hr class="my-2">
                    </div>
                </div>

                <div class="d-block text-left shadow bg-light rounded p-3 m-3">
                    <strong class="py-3">Opis vozila: </strong>
                    <p class="pl-3 py-3">{!!$car->description!!}</p>
                </div>
            </div>
            <div class="w-100 p-2">
                <hr>
                <a class="d-inline btn btn-outline-primary ml-3 float-left" data-toggle="modal" data-target="#calcModal2" href="/cars">Izračunaj kredit</a>
                <a class="d-inline btn btn-outline-primary mr-3 float-right" href="/cars">Natrag</a>
            </div>
        </div>                   
    </div>
</div>

<!-- calcModal2 -->
<div class="modal fade" id="calcModal2" tabindex="-1" role="dialog" aria-labelledby="calcModal2Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="calcModal2Label">Kalkulator kredita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="creditInput">Iznos kredita (€):</label>
                  @if ($car->price != NULL)                                        
                  <input type="number" class="form-control" id="creditInput2" value="{{$car->price}}" placeholder="#">
                  @endif
                </div>
                <div class="form-group">
                  <label for="annualInput">Broj anuiteta:</label>
                  <select class="form-control" id="annualInput2">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="cardInput">Kartica:</label>
                  <select class="form-control" id="cardInput">
                    <option>Visa</option>
                    <option>MasterCard</option>
                    <option>Maestro</option>
                    <option>Diners</option>
                    <option>Amex</option>
                  </select>
                </div>
                <div class="form-group">
                    <div id="output">
                      <p>Ukupan iznos kredita (€) je:</p>
                      <p class="form-control" id="output-value2"></p>
                    </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Natrag</button>
          <button type="button" class="btn btn-outline-primary operator" id="calculate2">Izračunaj</button>
        </div>
      </div>
    </div>
  </div>
@endsection
