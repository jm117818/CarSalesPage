@extends('layouts.app')
@section('content')

    <div class="container mt-5 w-50">


        <div id="carouselExampleControls" class="carousel slide rounded-1" data-ride="carousel">
            <div class="carousel-inner rounded-1">
                <div class="carousel-item active">
                    <img src="/uploads\cars\{{$car->zdjecie}}" class="d-block w-100 h-40" alt="...">
                </div>
            </div>
        </div>


        <div class="container2 bg-white rounded mt-5">
            <div class="container p-2 w-75">
                <div class="row p-2">
                    <div class="col mr-2 ">
                        <a>{{$car->brand->name}}</a>
                    </div>
                    <div class="col mr-2">
                        {{$car->model}}
                    </div>
                    <div class="col mr-2">
                        {{$car->rok_produkcji}}
                    </div>


                </div>
                <div class="row p-2">

                    <div class="col mr-2">
                        {{$car->przebieg}} km
                    </div>
                    <div class="col mr-2">
                        {{$car->rodzaj_paliwa}}
                    </div>
                    <div class="col mr-2">
                        {{$car->stan}}
                    </div>

                </div>
            </div>
            <div class="title">
                <h1 class="font-weight-bold p-3">({{$car->stan}}) {{$car->brand->name}} {{$car->model}} {{$car->rok_produkcji}}</h1>
            </div>

            <div class="price">
                <h1 class="font-weight-bold pl-3 pt-1 pb-1 text-danger">{{$car->cena}}PLN</h1>
            </div>

            <div class="description">
                <h2 class="p-3 font-weight-bold">Opis</h2>
                <p class="h6 p-3">{{$car->opis}}</p>
            </div>
        </div>
    </div>
@endsection

