<?php

namespace App\Http\Controllers;

use App\Models\Derecho;
use Illuminate\Http\Request;

//
class DerechoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('admin.derechos.index');
    }

	 // carga los datos
	 public function load_data()
    {
		return datatables()->of(Derecho::orderBy('nombre')->get())->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$dato = $request->all();
		$mensaje = array();
      if(Derecho::firstWhere('nombre', $dato['nombre'])) {
			$mensaje['success'] = false;
			$mensaje['msg'] = 'Error: El Derecho en Salud ya existe!';
		}
		else {
			Derecho::Create($dato);
			$mensaje['success'] = true;
			$mensaje['msg'] = 'Derecho en Salud creado!';
		}
		return response()->json($mensaje, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Derecho $derecho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Derecho $derecho)
    {
		$derecho->nombre = $request->nombre;
		$derecho->save();
		$data['success'] = true;
		$data['msg'] = 'Derecho en Salud actualizado.';
		return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Derecho  $derecho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Derecho $derecho)
    {
		$derecho->delete();
		$data['success'] = true;
		$data['msg'] = 'Derecho en Salud elminado.';
		return response()->json($data, 200);
    }
}
