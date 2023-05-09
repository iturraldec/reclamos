<?php

namespace App\Http\Controllers;

use App\Models\Derecho;
use App\Models\Causa;
use Illuminate\Http\Request;

//
class CausaController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$derechos = Derecho::OrderBy('nombre')->get();
		return view('admin.causas.index', compact('derechos'));
    }

	 // carga los datos
	 public function load_data()
    {
		return datatables()->of(Causa::with('derecho')->orderBy('nombre')->get())->toJson();
    }

	 // get by id
    public function get_by_id(Request $request, Causa $causa)
    {
		return response()->json($causa, 200);
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
      if(Causa::firstWhere('codigo', $dato['codigo'])) {
			$mensaje['success'] = false;
			$mensaje['msg'] = 'Error: La Causa del Reclamo ya existe!';
		}
		else {
			Causa::Create($dato);
			$mensaje['success'] = true;
			$mensaje['msg'] = 'Causa del Reclamo creado!';
		}
		return response()->json($mensaje, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Causa $derecho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Causa $causa)
    {
		$causa->derecho_id = $request->derecho_id;
		$causa->codigo = $request->codigo;
		$causa->nombre = $request->nombre;
		$causa->definicion = $request->definicion;
		$causa->defini = $request->defini;
		$causa->save();
		$data['success'] = true;
		$data['msg'] = 'Causa del Reclamo actualizado.';
		return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Causa  $causa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Causa $causa)
    {
		$causa->delete();
		$data['success'] = true;
		$data['msg'] = 'Causa del Reclamo elminado.';
		return response()->json($data, 200);
    }
}
