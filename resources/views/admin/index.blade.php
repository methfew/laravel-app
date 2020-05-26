@extends('layouts.app')

@section('content')
<div class="container-flex my-3 mx-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 order-lg-1 order-md-2 order-2">
            <div class="card">
                <div class="card-header font-weight-bold text-primary">Admin sučelje</div>
                <div class="card-body d-flex justify-content-between">                    
                    <h3 class="text-primary">Pregled oglasa</h3>
                    <a href="/admin/create" class="btn btn-primary">Novi oglas</a>
                </div>
                <div class="m-3">                                
                    @foreach ($cars as $car)
                        <div class="well well-lg m-3 shadow-sm py-3 px-3 mb-5 bg-white rounded">
                            <div class="row justify-content-around">                    
                                <div class="col-md-5 d-block">                                    
                                    <div id="carsCarousel{{$car->id}}" class="carousel slide w-100" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach ($car->images as $image)
                                            <li data-target="#carsCarousel{{$car->id}}" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                            @endforeach
                                        </ol>
                        
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
                                </div>                                            
                                                 
                                <div class="col-md-7 pt-2 align-middle text-center my-auto">                                    
                                    <div class="text-left pl-3">
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
                                    <div class="text-left pl-3">
                                        <strong>Godina proizvodnje: </strong>
                                        <small class="pl-3">{{$car->year_of_manufacture}}</small>
                                    </div>
                                        <hr class="my-2">
                                    <div class="d-flex pt-2">
                                        <a href="/admin/{{$car->id}}/edit" class="btn btn-sm btn-outline-success mb-3 ml-3">Uredi oglas</a>
                                
                                                {!!Form::open(['action' => ['AdminController@destroy', $car->id], 'method' => 'POST'])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        
                                                        <a href="/delete/{{$car->id}}" class="btn btn-sm btn-outline-danger button-delete ml-2" data-id="{{$car->id}}">Izbriši oglas</a>
                                                {!!Form::close()!!}                                       
                                    </div>
                                </div>                          
                            </div>
                        </div>
                    @endforeach
                    {{$cars->links()}}
                </div>
            </div>
        </div>
        <div class="col-lg-5 order-lg-2 order-md-1 order-1">
            <!-- Card Header - Dropdown -->
            <div class="d-none d-md-block">
                <div class="card-header border py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ukupan broj stvorenih oglasa po mjesecu</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body bg-transparent h-auto pb-sm-5 pb-0">
                    <div class="chart-area">
                    <canvas id="carChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="d-block bg-white border">
                <h6 class="font-weight-bold bg-white text-primary pt-3 pl-3">Ukupan broj oglasa: {{$car->count()}}</h6>
                <h6 class="font-weight-bold bg-white text-primary pt-2 pl-3">Ukupan broj pregleda: {{$cars->sum('view_count')}}</h6>
                <a data-toggle="modal" data-target="#TitleModal" href="/create" class="btn btn-sm btn-outline-primary mt-2 ml-3 mb-3">Promijeni tekst naslovne stranice</a>
            </div>
        </div>
    </div>
</div>

<!-- TitleModal -->
<div class="modal fade" id="TitleModal" tabindex="-1" role="dialog" aria-labelledby="TitleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-primary" id="TitleModalLabel">Promijeni tekst naslovne stranice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>                        
                        <th scope="col">Naslovi:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($main_titles as $main_title)
                        <div class="d-flex"> 
                            <tr>
                                <td>
                                    {{$main_title->main_title}}
                                </td>
                                <td>      
                                    {!! Form::open(['action' => ['MainTitlesController@destroy', $main_title->id],'method' => 'POST']) !!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    <a href="/destruct/{{$main_title->id}}" class="btn btn-sm btn-outline-danger button-delete" data-id="{{$main_title->id}}">Delete</a>
                                    {!! Form::close() !!}
                                </td>        
                            </tr>
                        </div>
                    @endforeach
                </tbody>
            </table>
            
            {!! Form::open(['action' => 'MainTitlesController@store', 'method' => 'POST']) !!}
            <div class="form-group">
    
                {{Form::label('main_title', 'Novi naslov:', ['class'=> 'text-primary pt-2'])}}
                {{Form::textarea('main_title', null, ["class"=> 'form-control'])}}
    
                {{Form::submit('Submit', ['class'=>'btn btn-outline-primary mt-3'])}}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Natrag</button>

        </div>
      </div>
    </div>
  </div>
@endsection
