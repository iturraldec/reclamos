<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnvioResultado extends Model
{
	//
	public $table = 'envios_resultados';
	
   //
	public $timestamps = false;
	
	//
	protected $fillable = ['nombre'];

	//
	public function getTipoArray()
	{
		$datos = self::orderBy('nombre')->get();
		$r = array('' => 'SELECCIONAR:');
		foreach($datos as $dato) {
			$r[$dato->id] = $dato->nombre;
		};
		return $r;
	}
}