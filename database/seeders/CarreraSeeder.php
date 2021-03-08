<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'abreviatura' => 'IELE',
            'carrera' => 'Ingeniería Eléctrica'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'IELC',
            'carrera' => 'Ingeniería Electrónica'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'IGEM',
            'carrera' => 'Ingeniería en Gestión Empresarial'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'IIND',
            'carrera' => 'Ingeniería Industrial'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'IINF',
            'carrera' => 'Ingeniería Informática'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'IMAT',
            'carrera' => 'Ingeniería en Materiales'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'IMEC',
            'carrera' => 'Ingeniería Mécanica'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'IMCT',
            'carrera' => 'Ingeniería en Mecatrónica'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'ISIC',
            'carrera' => 'Ingeniería en Sistemas Computacionales'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'ITIC',
            'carrera' => 'Ingeniería en Tecnologías en la Información y Comunicaciones'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'COPU',
            'carrera' => 'Contador Público'
        ]);

        DB::table('carreras')->insert([
            'abreviatura' => 'LADM',
            'carrera' => 'Licenciatura en Administración'
        ]);
        
    }
}
