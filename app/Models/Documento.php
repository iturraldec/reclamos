<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
	//
	protected $table = 'reclamo_docs';

	//
    protected $fillable = ['reclamo_id', 'nombre', 'nombre_cliente', 'usuario'];

}
