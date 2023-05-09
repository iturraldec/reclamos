<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedioRecepcion extends Model
{
	// 
	protected $table = 'medios_recepcion';

	//
	public $timestamps = false;
	
	//
   protected $fillable = ['medio'];

	//
	public function getDropdown()
	{
		$datos = self::orderBy('medio')->get();
		$r = array('' => 'SELECCIONAR:');
		foreach($datos as $dato) {
			$r[$dato->id] = $dato->medio;
		};
		return $r;
	}
	
}
