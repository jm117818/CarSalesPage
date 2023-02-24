<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([

            [
                'name' => 'Toyota',
            ],
            [
                'name' => 'Suzuki',
            ],
            [
                'name' => 'Lexus',
            ],
            [
                'name' => 'BMW',
            ],
            [
                'name' => 'Mercedes',
            ],
            [
                'name'=> 'Audi',
            ],
        ]);
    }
}
