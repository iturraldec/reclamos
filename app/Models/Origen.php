<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Origen extends Model
{
   //
	protected $table = 'origenes';
	
	//
	public $timestamps = false;
	
	//
	protected $fillable = ['nombre', 'padre_id'];

	//
	public function getTipoArray()
	{
		$datos = self::orderBy('nombre')->get();
		$r = array('' => 'SELECCIONAR:');
		foreach($datos as $dato) {
			if ($dato->padre_id) {
				$r[$dato->id] = $dato->nombre;
			}
		};
		return $r;
	}
}
