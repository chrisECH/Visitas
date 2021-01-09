<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Sistemas Computacionales',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Administraciòn de Empresas',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Desarrollo Academico',
        ]);

       
    }
}
