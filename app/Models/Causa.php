<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Derecho;

class Causa extends Model
{
	//
	public $timestamps = false;
	
	//
   protected $fillable = ['derecho_id', 'codigo', 'nombre', 'definicion', 'defini'];

	//
	protected $appends = ['derechos'];

	/**
	 * Derechos en salud.
	 *
	 * @return string
	 */
	public function getDerechosAttribute()
	{
	  return $this->derecho->nombre;
	}

	/**
     * Get the derecho.
     */
    public function derecho()
    {
        return $this->belongsTo(Derecho::class)->withDefault();
    }

	//
	public function getTipoArray()
	{
		$datos = self::orderBy('nombre')->get();
		$r = array('' => 'SELECCIONAR:');
		foreach($datos as $dato) {
			$r[$dato->id] = $dato->codigo;
		};
		return $r;
	}
	
}
