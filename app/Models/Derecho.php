<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Causa;

class Derecho extends Model
{
	//
	public $timestamps = false;
	
	//
   protected $fillable = ['nombre'];

	/**
     * Get the causas.
     */
    public function causas()
    {
        return $this->hasMany(Causa::class);
    }
}
