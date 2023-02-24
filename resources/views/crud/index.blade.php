@extends('layouts.app')
@section('content')
    <form action="add" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5 w-75 card-body">
            <h1>Dodawanie ogłoszenia:</h1>
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
                    <span style="color:red">@error('rodzaj_paliwa'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="exampleModel">Model:</label>
                    <input type="text" class="form-control" name='model' placeholder="Podaj model...">
                    <span style="color:red">@error('model'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="exampleRok_produkcji">Rok produkcji:</label>
                    <input type="number" max="2022" min="1900" class="form-control" name='rok_produkcji'
                           placeholder="Podaj rok produkcji...">
                    <span style="color:red">@error('rok_produkcji'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="examplePrzebieg">Przebieg:</label>
                    <input type="number" min="0" class="form-control" name='przebieg' placeholder="Podaj przebieg...">
                    <span style="color:red">@error('przebieg'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="examplePojemnosc_silnika">Pojemność silnika:</label>
                    <input type="number" min="0" max="7000" class="form-control" name='pojemnosc_silnika'
                           placeholder="Podaj pojemność silnika...">
                    <span style="color:red">@error('pojemnosc_silnika'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="w-100 mt-2"></div>

                <div class="col">
                    <label for="exampleRodzaj_paliwa">Rodzaj paliwa:</label></br>
                    <select name="rodzaj_paliwa" class="form-control">
                        <option value="" disabled selected>Wybierz rodzaj paliwa</option>
                        <option value="Benzyna">Benzyna</option>
                        <option value="Benzyna+LPG">Benzyna+LPG</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Hybryda">Hybryda</option>
                        <option value="Elektryczny">Elektryczny</option>
                    </select>
                    <span style="color:red">@error('rodzaj_paliwa'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="exampleStan">Stan:</label></br>
                    <select name="stan" class="form-control">
                        <option value="" disabled selected>Wybierz stan</option>
                        <option value="Nowy">Nowy</option>
                        <option value="Używany">Używany</option>
                        <option value="Uszkodzony">Uszkodzony</option>
                    </select>
                    <span style="color:red">@error('stan'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="exampleRodzaj_nadwozia">Rodzaj nadwozia:</label></br>
                    <select name="rodzaj_nadwozia" class="form-control">
                        <option value="" disabled selected>Wybierz rodzaj nadwozia</option>
                        <option value="Sedan">Sedan</option>
                        <option value="Coupe">Coupe</option>
                        <option value="Kombi">Kombi</option>
                        <option value="Kabriolet">Kabriolet</option>
                        <option value="SUV">SUV</option>
                        <option value="Terenowe">Terenowe</option>
                        <option value="Dostawcze">Dostawcze</option>
                    </select>
                    <span style="color:red">@error('rodzaj_nadwozia'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="exampleLokalizacja">Lokalizacja:</label></br>
                    <select name="lokalizacja" class="form-control">
                        <option value="" disabled selected>Wybierz lokalizacje</option>
                        <option value="Podkarpacie">Podkarpacie</option>
                        <option value="Małopolska">Małopolska</option>
                        <option value="Wielkopolska">Wielkopolska</option>
                        <option value="Lubelskie">Lubelskie</option>
                        <option value="Opolskie">Opolskie</option>
                        <option value="Śląskie">Śląskie</option>
                        <option value="Pomorskie">Pomorskie</option>
                        <option value="Kujawsko-Pomorskie">Kujawsko-Pomoroskie</option>
                        <option value="Dolnośląskie">Dolnośląskie</option>
                        <option value="Lubuskie">Lubuskie</option>
                        <option value="Zachodnio-pomorskie">Zachodnio-pomorskie</option>
                        <option value="Łódzkie">Łódzkie</option>
                        <option value="Mazowieckie">Mazowieckie</option>
                        <option value="Podlaskie">Podlaskie</option>
                        <option value="Świętokrzyskie">Świętokrzyskie</option>
                        <option value="Warmińsko-mazurskie">Warmińsko-mazurskie</option>
                    </select>
                    <span style="color:red">@error('lokalizacja'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="exampleCena">Cena:</label>
                    <input type="number" min="0" class="form-control" name='cena' placeholder="Podaj cenę...">
                    <span style="color:red">@error('cena'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="col">
                    <label for="nr_tel">Telefon:</label>
                    <input type="text" min="9" max='12' class="form-control" name='nr_tel'
                           placeholder="Podaj nr_tel...">
                    <span style="color:red">@error('nr_tel'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>

                <div class="w-100 mt-2"></div>

                <div class="col">
                    <label for="exampleOpis">Opis:</label>
                    <textarea type="text" class="form-control" name='opis' placeholder="Opis..." rows="10"></textarea>
                    <span style="color:red">@error('opis'){{"Wprowadź poprawne dane!"}} @enderror</span>
                </div>


                <div class="w-100"></div>

                <div class="col mb-3">
                    <label for="exampleZdjecie">Zdjecie:</label>
                    <input type="file" name="zdjecie" class="form-control">
                </div>

                <div class="w-100"></div>

                <div class="col mt-2">
                    <button type="reset" class="btn btn-danger btn-block">WYCZYŚĆ</button>
                </div>

                <div class="col mt-2">
                    <button type="submit" class="btn btn-primary btn-block">DODAJ</button>
                </div>

            </div>
        </div>
    </form>
@endsection
