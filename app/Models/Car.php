<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'brand_id',
        'rok_produkcji',
        'przebieg',
        'pojemnosc_silnika',
        'rodzaj_paliwa',
        'stan',
        'rodzaj_nadwozia',
        'lokalizacja',
        'opis',
        'zdjecie',
        'nr_tel',
        'user_id',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }


}
