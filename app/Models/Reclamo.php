<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
	//
    protected $fillable = [
        'tipo_id', 'causa_id', 'origen_id', 'estado_id', 'traslado_id', 'traslado_codigo',
        'user_id', 'user2_id', 'descripcion', 'analisis', 'medidas_adoptadas', 
		  'conclusion', 'suceso_at', 'send_mail', 'resuelto_at', 'dias_max_resp', 
		  'medio_recepcion_id', 'hoja_nro', 'administrado_tp', 'codigo_reipress', 
		  'recibido_at', 'paciente_tp', 'iafas_id', 'etapa_id', 'resultado_id', 
		  'notificacion_id', 'notificacion_at', 'conclusiona_id', 'delete_at',
		  'ma_estado', 'ma_inicio', 'ma_fin', 'codigo_primigenio', 'clinica_atiende', 'reporte_estado',
			'reporte_periodo', 'reporte_observacion'
    ];

	 //
	 protected $appends = ['respuesta_at'];

	 /**
     * Fecha maxima de respuesta al reclamo.
     *
     * @return date
     */
    public function getRespuestaAtAttribute()
    {
			if (! is_null($this->attributes['resuelto_at'])) {
				return null;
			}
			else {
				$fecha_respuesta = new \DateTime($this->attributes['recibido_at']);
				$dias = $this->attributes['dias_max_resp'];
				$intervalo = new \DateInterval("P1D");
				$i = 0;
				do {
					$aux = $fecha_respuesta;
					$aux->add($intervalo);
					$dia = $aux->format("D");
					if ($dia != 'Sat' && $dia != 'Sun') {
						$fecha_respuesta = $aux;
						$i++;
					}
				} while($i < $dias);
				return $fecha_respuesta->format('Y-m-d');
			}
    }

	 //
	 public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

	 //
	 public function estado()
    {
        return $this->belongsTo(Estado::class)->withDefault();
    }

	 //
	 public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

}
