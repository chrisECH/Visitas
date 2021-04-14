<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre'     =>    'Alejandro',
            'apellidop'  =>    'Conejo',
            'apellidom'  =>    'Magaña',
            'telefono'   =>    '4433250110',
            'email'      =>    'visitas@itmorelia.edu.mx',
            'password'   =>    Hash::make('secret'),
            'foto'       =>    null,
            'departamento_id'   =>    '1',
            'rol_id'     =>    '1'
        ]);
    }
}
