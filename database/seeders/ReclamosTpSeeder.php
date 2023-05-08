<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReclamosTpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reclamos_tp')->insert(['nombre' => 'Emitir recetas farmacologicas sin la denominación genérica internacional, datos erroneos, o incompleta.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Dispensar medicamentos y/o dispositivos médicos de manera insatisfactoria.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Direccionar  al usuario a comprar medicamentos o dispositivos médicos fuera del establecimiento de salud.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Direccionar ai usuario a realizarse procedimientos médicos a quirurgicos fuera del establecimiento de salud.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Negar o condicionar al usuario a realizarse procedimientos de apoyo al diagnóstico.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Demorar en el otorgamiento de citas o en la atencion para consulta externa.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Demora para la Hospitalización.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Demorar en el otorgamiento de prestaciones de slaud durante la hospitalización.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Demorar en la atención de emergencia de acuerdo con la prioridad.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Demorar en la atención de paciente obstétrica.Demorar en el otorgamiento o reprogramación de cupo para procedimiento quirúrgico.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Negar la atención en situaciones de emergencia.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Encontrar IPRESS y/o unidades prestadoras de servicios de salud cerradas en horario de atención o no presencias del personal responsable de la atención.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No acceso a la historia clínica.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Reclamos relacionados a la infraestructura de la institución.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No cumplir o no acceder a hacer el procedimiento de referencia o contrareferencia del usuario.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Demorar en la toma o entrega de resultados de exámenes de apoyo al diagnóstico.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Cobrar indebidamente.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No cuentan con ventanilla preferencial.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Incumplimiento en la programación de citas.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Incumplimiento en la programación de intervenciones quirúrgicas.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No brindar información de los procesos administrativos de la IPRESS.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No recibir de su médico y/o personal de salud tratante, información comprensible sobre su estado de saludo tratamiento.        ']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No recibir de su médico y/o personal de salud trato amable y respetuoso.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No brindar el procedimiento médico o quirúrgico adecuado.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No brindar untrato acorde a la cultura, condición y género del usuario.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Presunto error en los resultados de exámenes de apoyo al diagnóstico.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No brindar atención con pleno respeto a su privacidad, con presencia de terceros no autorizados por el usuario.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Retener al usuario de alta o al cadáver por motivo de deuda, previo acuerdo de pagos o trámites administrativos.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No brindar atención ocon respeto a la dignidad del usuario.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No solicitar al usuario o su representante legal el consentimiento informado por escrito de acuerdo a los requerimientos de la normatividad vigente.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Negar o demorar en brindar al usuario el acceso a su historia y a otros registros clìnicos solicitados y no garantizar su carácter reservado.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No realizar la gestión del reclamo de forma oportuna y adecuada.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'No contar con plataforma de atenciòn al usuario en salud de acuerdo a la normatividad vigente.']);
        DB::table('reclamos_tp')->insert(['nombre' => 'Otros relativos a la atención de salud en las IPRESS.']);
    }
}
