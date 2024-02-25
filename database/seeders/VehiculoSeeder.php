<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;




class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $color = array(
            'Rojo',
            'Plateado',
            'Negro',
            'Azul'
        );        
        $marca = array(
            'Audi',
            'Chevrolet',
            'Toyota',
            'Honda',
            'Nissan',
            'Ford',
            'Fiat'
        );        
        $modelo = array(
            'RAV4',
            'Corolla',
            'Hilux',
            'Aveo',
            'Matiz',
            'A1'
        );

        
        for ($i=0; $i < 50; $i++) { 
            $colork = array_rand($color);
            $marcak = array_rand($marca);
            $modelok = array_rand($modelo);
            DB::table('vehiculos')->insert([
                'placa' => Str::random(5),
                'color' => $color[$colork],
                'año' => mt_rand(1901, 2999),
                'fecha_ingreso' => Carbon::create(mt_rand(1901, 2999), mt_rand(01, 12), mt_rand(01, 28))->toDateString(),
                'modelo' => $modelo[$modelok],
                'marca' => $marca[$marcak],
            ]);
        }
        
    }
}
