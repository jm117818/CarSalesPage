@extends('layouts.app')
@section('content')
    <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="cid" value="{{$Info->id}}">
        <div class="container mt-5 w-75 card-body">
            <h1>Edytowanie ogłoszenia:</h1>
            <div class="row">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                <div class="col">
                    <label for="brand_id">Marka:</label></br>
                    <select name="brand_id" class="form-control">
                        @foreach(\App\Models\Brand::all() as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    <span style="color:red">@error('brand_id'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="exampleModel">Model:</label>
                    <input type="text" class="form-control" name='model' placeholder="Podaj model..."
                           value="{{$Info->model}}">
                    <span style="color:red">@error('model'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="exampleRok_produkcji">Rok produkcji:</label>
                    <input type="number" max="2022" min="1900" class="form-control" name='rok_produkcji'
                           placeholder="Podaj rok produkcji..." value="{{$Info->rok_produkcji}}">
                    <span style="color:red">@error('rok_produkcji'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="examplePrzebieg">Przebieg:</label>
                    <input type="number" min="0" class="form-control" name='przebieg' placeholder="Podaj przebieg..."
                           value="{{$Info->przebieg}}">
                    <span style="color:red">@error('przebieg'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="examplePojemnosc_silnika">Pojemność silnika:</label>
                    <input type="number" min="0" max="7000" class="form-control" name='pojemnosc_silnika'
                           placeholder="Podaj pojemność silnika..." value="{{$Info->pojemnosc_silnika}}">
                    <span style="color:red">@error('pojemnosc_silnika'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="w-100 mt-2"></div>

                <div class="col">
                    <label for="exampleCena">Cena:</label>
                    <input type="number" min="0" class="form-control" name='cena' placeholder="Podaj cenę..."
                           value="{{$Info->cena}}">
                    <span style="color:red">@error('cena'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="w-100 mt-2"></div>
                <div class="w-100 mt-2"></div>

                <div class="col">
                    <label for="exampleOpis">Opis:</label>
                    <textarea type="text" class="form-control" name='opis' placeholder="Opis..." rows="10"
                              autocomplete="{{$Info->opis}}"></textarea>
                    <span style="color:red">@error('opis'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>
                <div class="w-100"></div>

                <div class="col mt-2">
                    <button type="reset" class="btn btn-danger btn-block">WYCZYŚĆ</button>
                </div>

                <div class="col mt-2">
                    <button type="submit" class="btn btn-primary btn-block">EDYTUJ</button>
                </div>

            </div>
        </div>
    </form>
@endsection
