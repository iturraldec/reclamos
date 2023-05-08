<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrigenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('origenes')->insert(['nombre' => 'Administrativa']);
        DB::table('origenes')->insert(['nombre' => 'Asistencial']);
        DB::table('origenes')->insert(['nombre' => 'Atención al usuario']);
        DB::table('origenes')->insert(['nombre' => 'Contabilidad', 'padre_id' => 1]);
        DB::table('origenes')->insert(['nombre' => 'RR.HH', 'padre_id' => 1]);
        DB::table('origenes')->insert(['nombre' => 'Finanzas', 'padre_id' => 1]);
        DB::table('origenes')->insert(['nombre' => 'Logística', 'padre_id' => 1]);
        DB::table('origenes')->insert(['nombre' => 'Facturación', 'padre_id' => 1]);
        DB::table('origenes')->insert(['nombre' => 'Calidad', 'padre_id' => 1]);
        DB::table('origenes')->insert(['nombre' => 'Auditoría', 'padre_id' => 1]);
        DB::table('origenes')->insert(['nombre' => 'Limpieza y Mantenimiento', 'padre_id' => 1]);
        DB::table('origenes')->insert(['nombre' => 'Hospitalización', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Emergencia', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Farmacia', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Rayos x', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Ecografía', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Densitometría', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Consultorio Externo', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Laboratorio', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Nutrición', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Centro Quirúgico', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Sala Procedimientos', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Sala de Recuperación', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Unidad Cuidados Intensivos', 'padre_id' => 2]);
        DB::table('origenes')->insert(['nombre' => 'Admisión Ambulatorio', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Admisión Emergencia', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Admisión Odontología', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Central Telefónica', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Sanidad', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Plataforma de Atención al usuario', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Óptica', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Admisión Laboratorio', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Admisión Resocentro', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Presupuestos', 'padre_id' => 3]);
        DB::table('origenes')->insert(['nombre' => 'Mesa de partes', 'padre_id' => 3]);
    }
}
