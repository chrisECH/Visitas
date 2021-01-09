<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'nombre' => 'Coordinador',
        ]);

        DB::table('rols')->insert([
            'nombre' => 'Subdirector',
        ]);

        DB::table('rols')->insert([
            'nombre' => 'Jefe de DEpartamento',
        ]);

        DB::table('rols')->insert([
            'nombre' => 'Profesor',
        ]);
    }
}
