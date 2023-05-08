<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert(['nombre' => 'En Tramite']);
        DB::table('estados')->insert(['nombre' => 'Anulado']);
        DB::table('estados')->insert(['nombre' => 'Resuelto']);
        DB::table('estados')->insert(['nombre' => 'Registrado']);
    }
}
