<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

//
class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('admin.tipos-lst');
    }

	 // carga los datos
	 public function load_data()
    {
		return datatables()->of(Tipo::orderBy('nombre')->get())->toJson();
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
      if(Tipo::firstWhere('nombre', $dato['nombre'])) {
			$mensaje['success'] = false;
			$mensaje['msg'] = 'Error: El Tipo de Reclamo ya existe!';
		}
		else {
			Tipo::Create($dato);
			$mensaje['success'] = true;
			$mensaje['msg'] = 'Tipo de Reclamo creado!';
		}
		return response()->json($mensaje, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
		$tipo->nombre = $request->nombre;
		$tipo->save();
		$data['success'] = true;
		$data['msg'] = 'Tipo de Reclamo actualizado.';
		return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
		$tipo->delete();
		$data['success'] = true;
		$data['msg'] = 'Tipo de Reclamo elminado.';
		return response()->json($data, 200);
    }
}
