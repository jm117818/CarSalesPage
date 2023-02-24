@extends('layouts.app')
@section('content')
    <div class="offset-3 w-50 pt-4 mt-4">
        <div class="container2">
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
                                <p class="card-text">{{$car->cena}} PLN</p>
                                <div class="btn-group">
                                    <a href="delete/{{$car->id}}" class="btn btn-danger">Usuń</a>
                                    <a href="edit/{{$car->id}}" class="btn btn-primary">Edytuj</a>
                                    @if($car->status == false)
                                        <a href="{{route('activate',$car)}}" class="btn btn-success">Aktywuj</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $cars->links() }}
        </div>
    </div>
@endsection
