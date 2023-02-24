<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    function delete($id)
    {
        $delete = DB::table('cars')->where('id', $id)->delete();
        return redirect('usercars');
    }

    function index()
    {
        return view('crud.index');
    }

    function show()
    {
        $data = Car::query()->where('status', true)->get();
        return view('welcome', ['cars' => $data]);
    }

    function showusercars()
    {
        $data = Car::paginate(3);
        return view('crud.usercars', ['cars' => $data]);
    }


    function add(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'model' => 'required',
            'rok_produkcji' => 'required',
            'przebieg' => 'required|min:0',
            'pojemnosc_silnika' => 'required|min:0|max:7000|', //type numeric
            'rodzaj_paliwa' => 'required',
            'stan' => 'required',
            'rodzaj_nadwozia' => 'required',
            'lokalizacja' => 'required',
            'cena' => 'required|min:0',
            'opis' => 'required|min:10',
            'nr_tel' => 'required|min:9|max:12'
        ]);

        $car = new Car;
        $car->brand_id = $request->input('brand_id');
        $car->model = $request->input('model');
        $car->rok_produkcji = $request->input('rok_produkcji');
        $car->przebieg = $request->input('przebieg');
        $car->pojemnosc_silnika = $request->input('pojemnosc_silnika');
        $car->rodzaj_paliwa = $request->input('rodzaj_paliwa');
        $car->stan = $request->input('stan');
        $car->rodzaj_nadwozia = $request->input('rodzaj_nadwozia');
        $car->lokalizacja = $request->input('lokalizacja');
        $car->cena = $request->input('cena');
        $car->opis = $request->input('opis');
        $car->user_id = 1;
        $car->nr_tel = $request->input('nr_tel');

        if ($request->hasFile('zdjecie')) {
            $file = $request->file('zdjecie');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/cars/', $filename);
            $car->zdjecie = $filename;
        }
        $car->save();
        return redirect()->back()->with('status', 'Dodano!');
    }

    function edit($id)
    {
        $row = DB::table('cars')->where('id', $id)->first();
        $data = [
            'Info' => $row
        ];
        return view('crud.edit', $data);
    }

    function update(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'model' => 'required',
            'rok_produkcji' => 'required',
            'przebieg' => 'required|min:0',
            'pojemnosc_silnika' => 'required|min:0|max:7000',
            'cena' => 'required|min:0',
            'opis' => 'required|min:10'
        ]);
        $update = DB::table('cars')->where('id', $request->input('cid'))->update([
            'brand_id' => $request->input('brand_id'),
            'model' => $request->input('model'),
            'rok_produkcji' => $request->input('rok_produkcji'),
            'przebieg' => $request->input('przebieg'),
            'pojemnosc_silnika' => $request->input('pojemnosc_silnika'),
            'cena' => $request->input('cena'),
            'opis' => $request->input('opis')
        ]);
        return redirect('usercars');
    }

    function detail(Car $car)
    {
        $data = Car::query()->findOrFail($car->id);
        return view('crud.detail', ['car' => $data]);
    }

    function activate(Car $car)
    {
        $car->status = true;
        $car->update();
        return back();
    }

    public function search(Request $request){

        $marka = $request->input('brand_id');
        $od_cena = $request->input('od_cena');
        $do_cena = $request->input('do_cena');
        $od_rok = $request->input('od_rok');
        $do_rok = $request->input('do_rok');
        $model = $request->input('model');
        $cars = Car::query()
            ->whereBetween('cena',[$od_cena,$do_cena])
            ->WhereBetween('rok_produkcji',[$od_rok,$do_rok])
            ->Where('brand_id','LIKE',"{$marka}")
            ->Where('model',"LIKE","{$model}")
            ->get();


        return view('welcome',compact('cars'));
            }

}
