<?php
namespace App\Http\Controllers;
use App\Models\Documento;
use Illuminate\Http\Request;

//
class DocumentoController extends Controller {

	// documentos de un reclamo
	public function load($reclamo_id)
	{
		$documentos = Documento::where('reclamo_id', '=', $reclamo_id)	->get();
		return datatables()->of($documentos)->toJson();
	}

	// agregar documentos a un reclamo
	public function store(Request $request, $reclamo_id)
	{
		$user = $request->user();
		foreach($request->file('documentos') as $file) {
			$name = uniqid().'.'.$file->getClientOriginalExtension();
			$file->storeAs('public/documentos', $name);
			$documento['reclamo_id'] = $reclamo_id;
			$documento['nombre'] = $name;
			$documento['nombre_cliente'] = $file->getClientOriginalName();
			$documento['usuario'] = ($user) ? $user->name : 'Paciente';
			Documento::Create($documento);
		}	
		return response()->json(["msg" => "Archivo(s) subido(s)!"], 200);
	}
	
	// descargar documentos
	public function file_download(Documento $documento)
	{
		$path = storage_path('app/public/documentos/');
		return response()->download($path.$documento->nombre, $documento->nombre_cliente);
	}

	 /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documento $documento
     * @return \Illuminate\Http\Response
     */

    public function destroy(Documento $documento)
    {
		$path = storage_path('app/public/documentos/');
		unlink($path.$documento->nombre);
		$documento->delete();
		return response()->json(["msg" => "Documento eliminado!"], 200);
    }

}
