<?php

use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Brand::class)->constrained();
            $table->string('model');
            $table->integer('rok_produkcji');
            $table->integer('przebieg');
            $table->integer('pojemnosc_silnika');
            $table->string('rodzaj_paliwa');
            $table->string('stan');
            $table->string('rodzaj_nadwozia');
            $table->string('lokalizacja');
            $table->integer('cena');
            $table->text('opis');
            $table->string('zdjecie');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nr_tel');
            $table->boolean('status')->default(False);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
