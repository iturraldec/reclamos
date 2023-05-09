<?php

namespace App\Http\Controllers;

use App\Models\Origen;
use Illuminate\Http\Request;

//
class OrigenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return view('admin.origenes-index');
    }

	 // carga los datos, maestro
	 public function load_data()
    {
		$origen = Origen::where("padre_id", null)->orderBy('nombre')->get();
		return datatables()->of($origen)->toJson();
    }

	 // carga los datos, detalle
	 public function load_datar(Request $request)
    {
		$origen = Origen::where("padre_id", $request->area_id)->orderBy('nombre')->get();
		return datatables()->of($origen)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$tipo = $request->tipo;
		$nombre = $request->nombre;
		$mensaje = array();
		if ($tipo == 'aarea') {
			if(Origen::firstWhere('nombre', $nombre)) {
				$mensaje['success'] = false;
				$mensaje['msg'] = 'El Area del Origen ya existe!';
			}
			else {
				Origen::Create(array('nombre' => $nombre));
				$mensaje['success'] = true;
				$mensaje['msg'] = 'Area del Origen creado!';
			}
		}
		else {
			if(Origen::firstWhere('nombre', $nombre)) {
				$mensaje['success'] = false;
				$mensaje['msg'] = 'El Origen del Reclamo ya existe!';
			}
			else {
				$datos["padre_id"] = $request->area_id;
				$datos["nombre"] = $nombre;
				Origen::Create($datos);
				$mensaje['success'] = true;
				$mensaje['msg'] = 'Origen del Reclamo creado!';
			}
		}
		return response()->json($mensaje, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Origen $origen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Origen $origen)
    {
		$origen->nombre = $request->nombre;
		$origen->save();
		$data['success'] = true;
		$data['msg'] = 'Registro actualizado.';
		return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Origen  $origen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Origen $origen)
    {
		if (is_null($origen->padre_id)) {
			Origen::where('padre_id', $origen->id)->delete();
			$data['msg'] = 'Area del Reclamo elminada.';
		}
		else {
			$data['msg'] = 'Origen del Reclamo elminado.';
		}
		$origen->delete();
		$data['success'] = true;
		return response()->json($data, 200);
    }
}
