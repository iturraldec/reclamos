<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

//
class EstadoController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('admin.estados-lst');
    }

	 // carga los datos
	 public function load_data()
    {
		return datatables()->of(Estado::orderBy('nombre')->get())->toJson();
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
      if(Estado::firstWhere('nombre', $dato['nombre'])) {
			$mensaje['success'] = false;
			$mensaje['msg'] = 'El Estado del Reclamo ya existe!';
		}
		else {
			Estado::Create($dato);
			$mensaje['success'] = true;
			$mensaje['msg'] = 'Estado del Reclamo creado!';
		}
		return response()->json($mensaje, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
		$estado->nombre = $request->nombre;
		$estado->save();
		$data['success'] = true;
		$data['msg'] = 'Estado del Reclamo actualizado.';
		return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
		$estado->delete();
		$data['success'] = true;
		$data['msg'] = 'Estado del Reclamo elminado.';
		return response()->json($data, 200);
    }
}
