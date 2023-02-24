@extends('layouts.app')
@section('content')
    <div class="container mt-5 w-50">
        <h3>Ogłoszenia:</h3>
        <form action="{{route('search')}}" method="GET">
            <div class="container mt-5 w-100 card-body border border-success mb-5">
                <h3>Filtry:</h3>
                <div class="row">
                    <div class="col">
                        <label>Marka:</label>
                        <select name="brand_id" class="form-control">
                            @foreach(\App\Models\Brand::all() as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label>Model:</label>
                        <input name="model" type="text" class="form-control" required/>
                    </div>
                    <div class="col">
                        <label>Cena od:</label>
                        <input name="od_cena" type="number" class="form-control" required/>
                    </div>
                    <div class="col">
                        <label>Cena do:</label>
                        <input name="do_cena" type="number" class="form-control" required/>
                    </div>
                    <div class="col">
                        <label>Rok od:</label>
                        <input name="od_rok" type="number" class="form-control" required/>
                    </div>
                    <div class="col">
                        <label>Rok do:</label>
                        <input name="do_rok" type="number" class="form-control" required/>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2 mb-2" >Szukaj</button>
            </div>


        </form>

        <div class="container2 ">
            @foreach($cars as $car)
                <div class="card mb-3" style="width:100%;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="uploads\cars\{{$car->zdjecie}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">({{$car->stan}}
                                    ) {{$car->brand->name}} {{$car->model}} {{$car->rok_produkcji}}</h5>
                                <h4 class="card-text text-danger">{{$car->cena}} PLN</h4>
                                <h5 class="card-text">Tel: {{$car->nr_tel}}</h5>
                                <p class="card-text">{{$car->pojemnosc_silnika}} ccm </p>
                                <p class="card-text">{{$car->przebieg}} km </p>
                                <p class="card-text">{{$car->lokalizacja}} </p>
                                <a class="card-text" href="{{route('details',['car'=>$car])}}">Wiecej inforamcji</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--            {{ $cars->links() }}--}}
        </div>
    </div>
@endsection
