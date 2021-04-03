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
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Ingeniería Eléctrica',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Gestión Empresarial',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Ingeniería Industrial',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Ingeniería Informática',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Ingeniería en Materiales',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Ingeniería Mécanica',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Ingeniería en Mecatrónica',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Ingeniería en Tecnologías en la Información y Comunicaciones',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Departamento de Contador Público',
        ]);
        

       
    }
}
