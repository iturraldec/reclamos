<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CausasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('causas')->insert(['codigo'=>'1101', 
            'derecho'=>'Acceso a los Servicios de Salud',
            'nombre' => 'Emitir recetas farmacologicas sin la denominación genérica internacional, datos erroneos, o incompleta.',
            'definicion'=>'Se considera aquellos reclamos relacionados a la entrega de recetas emitidas por el profesional de salud, sin consignar el nombre genérico del medicamento, con letra ilegible, incompleta, entre otras.',
            'defini'=>'Receta con medicamentos de marca y/o incompleta y/o ilegible.'
        ]);
        DB::table('causas')->insert(['codigo'=>'1103', 
            'derecho'=>'Acceso a los Servicios de Salud',
            'nombre' => 'Direccionar  al usuario a comprar medicamentos o dispositivos médicos fuera del establecimiento de salud.',
            'definicion'=>'Inducir al usuario a comprar determinados medicamentos o dispositivos médicos fuera de la IPRESS a pesar de estar cubiertos a contar con stock en el establecimiento.',
            'defini'=>'Me dicen que compre afuera.'
        ]);
        DB::table('causas')->insert(['codigo'=>'1104', 
            'derecho'=>'Acceso a los Servicios de Salud',
            'nombre' => 'Direccionar ai usuario a realizarse procedimientos médicos a quirurgicos fuera del establecimiento de salud.',
            'definicion'=>'Inducir al usuario a realizarse procedimientos médicos o quirúrgicos fuera del establecimiento, pese a estar cubiertos o disponibles en la IPRESS.',
            'defini'=>'Me dijeron que me realice el procedimiento afuera.'
        ]);
    }
}
