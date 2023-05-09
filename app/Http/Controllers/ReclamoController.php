<?php

namespace App\Http\Controllers;

use App\Models\Reclamo;
use App\Models\Tipo;
use App\Models\Causa;
use App\Models\Origen;
use App\Models\Estado;
use App\Models\Traslado;
use App\Models\IAFAS;
use App\Models\MedioRecepcion;
use App\Models\User;
use App\Models\Etapa;
use App\Models\Resultado;
use App\Models\ConclusionAnticipada;
use App\Models\EnvioResultado;
use App\Models\Documento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\SimpleType\Jc;

//
class ReclamoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$reclamos = Reclamo::paginate(15);
		return view('admin.reclamos.index', compact("reclamos"));
    }

	 // carga los reclamos
	 public function load_data()
    {
		$reclamos = Reclamo::with('user')
							->with('estado')
							->where('delete_at', '=', NULL)
							->get();
		return datatables()->of($reclamos)->toJson();
    }

	 // dashboard de la app
	 public function dashboard()
	 {
		// conteo de reclamos por tipo
		$tipos = DB::select('SELECT * FROM v_count_tipos');

		// conteo de reclamos por causa
		$causas = DB::select('SELECT * FROM v_count_causas');

		// conteo de reclamos por origen
		$origenes = DB::select('SELECT * FROM v_count_origenes');

		// conteo de reclamos por estado
		$estados = DB::select('SELECT * FROM v_count_estados');
		$querys = array("tipos", "causas", "origenes", "estados");
		return view('admin.dashboard', compact($querys));
	 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$medio = new MedioRecepcion();
			$medios = $medio->getDropdown();
			return view('paciente.reclamo', compact('medios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
    	$datos = $request->all();

			// si debo generar el numero de hoja, me aseguro de borrarlo primero
			$generarNroHoja = ($datos['medio_recepcion_id'] == 1);
			if ( $generarNroHoja ) {
				$datos['hoja_nro'] = '';
			}

			$use = array(
				'dip' => $datos['dip1'],
				'rol' => 'Guest',
				'dip_tp' => $datos['dip_tp1'],   
				'password' => md5($datos['dip1']),
				'name' => $datos['nombre1'],
				'domicilio' => $datos['dir1'],
				'email' => $datos['email1'],
				'telefono' => $datos['tlf1'],
			);

			try {
				$veri_email = User::where('email',$datos['email1'])->get();
				if (json_encode($veri_email) == '[]') {
					$usuario = User::firstOrCreate($use);
					$reclamo = array(
						'user_id' => $usuario['id'],
						'descripcion' => $datos['reclamo'],
						'suceso_at' => $datos['suceso_at'],
						'dias_max_resp' => 30,
						'send_mail' => $datos['send_mail'],
						'medio_recepcion_id' => $datos['medio_recepcion_id'],
						'hoja_nro' => $datos['hoja_nro'],
						'recibido_at' => $datos['recibido_at'],
						'resuelto_at' => null
					);
					if($datos['representante']){
						$use2 = array(			
							'dip' => $datos['representante']['dip2'],
							'rol' => 'Guest',
							'dip_tp' => $datos['representante']['dip_tp2'],   
							'password' => md5($datos['representante']['dip2']),
							'name' => $datos['representante']['nombre2'],
							'domicilio' => $datos['representante']['dir2'],
							'email' => $datos['representante']['email2'],
							'telefono' => $datos['representante']['tlf2']		
						);
						$resp = User::firstOrCreate($use2);
						$reclamo['user2_id'] = $resp['id'];
					}

					$reclamo = Reclamo::Create($reclamo);
					if ( $generarNroHoja ) {
						$reclamo->hoja_nro = str_pad($reclamo->id, 10, '0', STR_PAD_LEFT);
						$reclamo->save();      	
					}

					return response()->json($reclamo, 200);
				
				}else{
					$reclamo = array(
						'user_id' => $veri_email[0]['id'],
						'descripcion' => $datos['reclamo'],
						'suceso_at' => $datos['suceso_at'],
						'dias_max_resp' => 30,
						'send_mail' => $datos['send_mail'],
						'medio_recepcion_id' => $datos['medio_recepcion_id'],
						'hoja_nro' => $datos['hoja_nro'],
						'recibido_at' => $datos['recibido_at'],
						'resuelto_at' => null
					);
					if($datos['representante']){
						$use2 = array(			
							'dip' => $datos['representante']['dip2'],
							'rol' => 'Guest',
							'dip_tp' => $datos['representante']['dip_tp2'],   
							'password' => md5($datos['representante']['dip2']),
							'name' => $datos['representante']['nombre2'],
							'domicilio' => $datos['representante']['dir2'],
							'email' => $datos['representante']['email2'],
							'telefono' => $datos['representante']['tlf2']		
						);
						$resp = User::firstOrCreate($use2);
						$reclamo['user2_id'] = $resp['id'];
					}
					$reclamo = Reclamo::Create($reclamo);
					if ( $generarNroHoja ) {
						$reclamo->hoja_nro = str_pad($reclamo->id, 10, '0', STR_PAD_LEFT);
						$reclamo->save();      	
					}
					return response()->json($reclamo, 200);
					//return response()->json(['error' => $veri_email[0], 'reclamo' =>$reclamo], 200);
				}
			} catch (Exception $e) {
				
		}
	}
	 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function show(Reclamo $reclamo)
    {
		$representante = User::find($reclamo->user2_id);
		$datos = new Tipo();
		$tipos = $datos->getTipoArray();
		$causas = new Causa();
		$datos = new Origen();
		$origenes = $datos->getTipoArray();
		$datos = new Estado();
		$estados = $datos->getTipoArray();
		$datos = new IAFAS();
		$iafas = $datos->getTipoArray();
		$datos = new Etapa();
		$etapas = $datos->getTipoArray();
		$datos = new Traslado();
		$traslados = $datos->getTipoArray();
		$datos = new Resultado();
		$resultados = $datos->getTipoArray();
		$datos = new ConclusionAnticipada();
		$conclusiones_anticipadas = $datos->getTipoArray();
		$datos = new EnvioResultado();
		$notificaciones = $datos->getTipoArray();
		return view('admin.reclamos.show', compact('reclamo', 'representante', 'tipos', 
			'causas', 'origenes', 'estados', 'iafas', 'etapas', 'traslados', 'resultados', 
			'conclusiones_anticipadas', 'notificaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamo $reclamo)
    {
		$representante = User::find($reclamo->user2_id);
		$datos = new Tipo();
		$tipos = $datos->getTipoArray();
		$datos = new Causa();
		$causas = $datos->getTipoArray();
		$datos = new Origen();
		$origenes = $datos->getTipoArray();
		$datos = new Estado();
		$estados = $datos->getTipoArray();
		$datos = new IAFAS();
		$iafas = $datos->getTipoArray();
		$datos = new Etapa();
		$etapas = $datos->getTipoArray();
		$datos = new Traslado();
		$traslados = $datos->getTipoArray();
		$datos = new Resultado();
		$resultados = $datos->getTipoArray();
		$datos = new ConclusionAnticipada();
		$conclusiones_anticipadas = $datos->getTipoArray();
		$datos = new EnvioResultado();
		$notificaciones = $datos->getTipoArray();
		return view('admin.reclamos.edit', compact('reclamo', 'representante', 'tipos', 
			'causas', 'origenes', 'estados', 'iafas', 'etapas', 'traslados', 'resultados', 
			'conclusiones_anticipadas', 'notificaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reclamo $reclamo)
    {
		// grabo la historia medica del usuario
		$usuario = User::find($reclamo->user_id);
		$usuario->codigo_historia = $request->codigo_historia;
		$usuario->save();

		//
		$reclamo->analisis = $request->analisis;
		$reclamo->causa_id = $request->causa_id;
		$reclamo->conclusion = $request->conclusion;
		$reclamo->conclusiona_id = $request->conclusiona_id;
		$reclamo->estado_id = $request->estado_id;
		$reclamo->etapa_id = $request->etapa_id;
		$reclamo->iafas_id = $request->iafas_id;
		$reclamo->medidas_adoptadas = $request->medidas_adoptadas;
		$reclamo->origen_id = $request->origen_id;
		$reclamo->paciente_tp = $request->paciente_tp;
		$reclamo->recibido_at = $request->recibido_at;
		$reclamo->resuelto_at = $request->resuelto_at;
		$reclamo->resultado_id = $request->resultado_id;
		$reclamo->suceso_at = $request->suceso_at;
		$reclamo->tipo_id = $request->tipo_id;
		$reclamo->traslado_codigo = $request->traslado_codigo;
		$reclamo->traslado_id = $request->traslado_id;
		$reclamo->ma_estado = $request->ma_estado;
		$reclamo->ma_inicio = $request->ma_inicio;
		$reclamo->ma_fin = $request->ma_fin;
		$reclamo->codigo_primigenio = $request->codigo_primigenio;
		if ($request->ma_tipo != 'NULL')
			$reclamo->ma_tipo = $request->ma_tipo;
		if ($request->ma_proceso != 'NULL')
			$reclamo->ma_proceso = $request->ma_proceso;
		if ($request->ma_proceso2 != 'NULL')
			$reclamo->ma_proceso2 = $request->ma_proceso2;
		$reclamo->ma_procesoo = $request->ma_procesoo;
		$reclamo->observacionr = $request->observacionr;
		$reclamo->usrs_involucrados = $request->usrs_involucrados;

		// si el resultado del reclamo es: CONCLUIDO ANTICIPADAMENTE
		// notificacion_id y notificacion_at, son NULL
		if ( $request->resultado_id == 6) {
			$reclamo->notificacion_id = NULL;
			$reclamo->notificacion_at = NULL;
		}
		else {
			$reclamo->notificacion_id = $request->notificacion_id;
			$reclamo->notificacion_at = $request->notificacion_at;
		}
		
		$reclamo->save();
		$r["success"] = 'ok';
		$r["msg"] = 'Reclamo actualizado.';
		return response()->json($r, 200);
    }

	 /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reclamo $reclamo)
    {
		$time = new \DateTime();
		$reclamo->delete_at = $time->format('Y/m/d H:i:s');
		$reclamo->save();
		$data['success'] = true;
		$data['msg'] = 'Reclamo borrado.';
		return response()->json($data, 200);
    }

	 /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
	  * CREATE OR REPLACE VIEW v_desistimiento AS
		SELECT a.*,
				b.name,
				b.dip,
				b.domicilio
		FROM reclamos a INNER JOIN users b ON a.user_id = b.id;
     */
    public function desistimiento(Reclamo $reclamo)
    {
		// Creating the new document...
		$phpWord = new \PhpOffice\PhpWord\PhpWord();

		// desistimiento
		$desistimiento = DB::select("SELECT * FROM v_desistimiento WHERE id='{$reclamo->id}'");

		/* Note: any element you append to a document must reside inside of a Section. */

		// Adding an empty Section to the document...
		$section = $phpWord->addSection();

		/*
		* Note: it's possible to customize font style of the Text element you add in three ways:
		* - inline;
		* - using named font style (new font style object will be implicitly created);
		* - using explicitly created font style object.
		*/

		// Adding Text element with font customized inline...
		$section->addImage(
		    'assets/images/logo.png',
		    array(
		        'width'         => 150,
		        'height'        => 35,
		        'marginTop'     => -1,
		        'marginLeft'    => -1,
		        'wrappingStyle' => 'behind'
		    )
		);
		$textRun = $section->addTextRun([
			"alignment" => Jc::END,
	  	]);
		$fuente = [
			"name" => "Arial",
			"size" => 10,
			"italic" => true,
	  	];
	  	$textRun->addText('FOR-CEM-260 V.01', $fuente);
		$textRun->addTextBreak(2);
		$textRun = $section->addTextRun([
			"alignment" => Jc::CENTER,
	  	]);
		$fuente = [
			"name" => "Arial",
			"size" => 12,
			"italic" => true,
			"bold" => true,
	  	];
		$textRun->addText('TRATO DIRECTO O DESISTIMIENTO DE RECLAMO', $fuente);
		$textRun->addTextBreak(2);
		$textRun = $section->addTextRun([
			"alignment" => Jc::BOTH,
			"lineHeight" => 1.5,
	  	]);
		$fuente = [
			"name" => "Arial",
			"size" => 12,
	  	];
		$textRun->addText("Yo, {$desistimiento[0]->name} identificado(a) con CE/DNI/PASAPORTE Nro. {$desistimiento[0]->dip} domiciliado(a) en {$desistimiento[0]->domicilio}, me presento y preciso que: ", $fuente);
		$textRun->addText("Con fecha {$desistimiento[0]->suceso_at}, mediante su Plataforma de Atención al Usuario formulé el reclamo Nro. {$desistimiento[0]->hoja_nro} por haber sentido vulnerado mis derechos en salud; sin embargo, debido a:", $fuente);
		$textRun = $section->addTextRun([
			"alignment" => Jc::START,
			"lineHeight" => 1.5,
	  	]);
		$fuente = [
			"name" => "Arial",
			"size" => 10,
			"italic" => true,
	  	];
		$textRun->addText("(Marque con una (X) si desea expresar las causales de desistimiento si desea mantenerlas en reserva)", $fuente);
		$textRun->addTextBreak(2);
		$fuente = [
			"name" => "Arial",
			"size" => 12,
	  	];
		$textRun->addText('Sin expresión de causa  ⬜', $fuente);
		$textRun->addTextBreak(2);
		$textRun->addText('Con expresión de causa  ⬜', $fuente);
		$textRun->addTextBreak(2);
		$textRun->addText('Detalles de las causas:', $fuente);
		$textRun->addTextBreak(1);
		$textRun->addText(str_repeat('.', 400), $fuente);
		$textRun = $section->addTextRun([
			"alignment" => Jc::BOTH,
			"lineHeight" => 1.5,
	  	]);
		$textRun->addText("En ese sentido, de acuerdo a lo establecido en el artículo 25.2 del D.S. N° 002-2019-SA – “Reglamento para la Gestión de Reclamos y Denuncias de los Usuarios de IAFAS, IPRESS y UGIPRESS Públicas, Privadas o Mixtas”, que señala: “El reclamo puede concluir en los siguientes supuestos: a) Acuerdo de trato directo sobre los mismos hechos que motivaron el reclamo (…).   b) Desistimiento por escrito del reclamo por parte del usuario o tercero legitimado, con o sin expresión de causa (…)”. De forma libre y voluntaria, ME DESISTO de continuar con el presente reclamo por los motivos antes expuestos; renunciando a volver a formular reclamo por el mismo hecho y a cualquier acción administrativa o legal a que hubiere dado lugar la presente investigación del reclamo. Firmando la presente en señal de conformidad.", $fuente);

		// Saving the document as OOXML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save(storage_path('desistimiento.docx'));
		return response()->download(storage_path('desistimiento.docx'));

    }

	/*
		Generar las tramas de los reclamos.

		Ultima modificacion: 23/06/2022
	*/

	public function tramas(Request $request)
	{
		$limite = $request->all();
		if (empty($limite)) {
			return view('admin.reclamos.tramas');
		}
		else {
			//$tramas = DB::select("SELECT * FROM v_tramas");
			//return $request->desde;
			//$desde = date($request->desde, 'Ym');
			$fechaComoEntero = strtotime($request->desde);
			$fechaComoEntero2 = strtotime($request->hasta);
			$desde = date("Ym", $fechaComoEntero);
			$hasta = date('Ym', $fechaComoEntero2);
			
			$tramas = DB::table("v_tramas_test")
			->where('col_a','>=',$desde)
			->where('col_a','<=',$hasta)
			->get();

			//return $tramas;
			// Open a file in write mode ('w')
			$filePath = storage_path('app/tramas_reclamos.csv');
			$fp = fopen($filePath, 'w');
			  
			// cabecera
			$cabecera = array(
				'id', 'PERIODO DE DECLARACION', 'TIPO DE ADMINISTRADO DECLARANTE', 'CODIGO ADMINISTRATIVO DECLARANTE', 'CODIGO UGIPRESS', 'TIPO DE INSTITUCION RECLAMO', 'CODIGO ADMINISTRATIVO RECLAMO', 'MEDIO PRESENTACION RECLAMO', 'CODIGO UNICO REGISTRO RECLAMO', 'TIPO DOCUMENTO USUARIO AFECTADO', 'DNI', 'RAZON SOCIAL', 'NOMBRES APELLIDO PATERNO APELLIDO MATERNO', 'DOCUMENTO IDENTIDAD QUIEN PRESENTA RECLAMO', 'DNI QUIEN PRESENTA RECLAMO', 'RAZON SOCIAL', 'NOMBRES APELLIDO PATERNO APELLIDO MATERNO', 'AUTORIZACION CORREO', 'CORREO', 'DOMICILIO', 'CELULAR', 'RECEPCION RECLAMO', 'FECHA RECLAMO', 'DETALLE RECLAMO', 'TIPO DE SERVICIO', 'COMPETENCIA RECLAMO', 'CLASIFICACION 1', 'CLASIFICACION 2', 'CLASIFICACION 3', 'ESTADO RECLAMO', 'CODIGO RECLAMO PRIMIGENIO', 'ETAPA RECLAMO', 'TIPO DE ADMINISTRADO', 'CODIGO DEL ADMINISTRADO', 'RESULTADO RECLAMO', 'MOTIVO CONCLUSION', 'FECHA RESULTADO', 'COMUNICACION DEL RESULTADO', 'FECHA DE NOTIFICACION DE RESULTADO'
			);
			fputcsv($fp, (array) $cabecera, ";");

			// Loop through file pointer and a line
			foreach ($tramas as $trama) {
				fputcsv($fp, (array) $trama, ";");
			}
			fclose($fp);

			$headers = ['Content-Type: text/csv'];
			$fileName = time().'.csv';
			return response()->download($filePath, $fileName, $headers);
		}
	}

	public function tramasadop(Request $request)
	{
		$limite = $request->all();
		if (empty($limite)) {
			return view('admin.reclamos.tramasadop');
		}
		else {
			//$tramas = DB::select("SELECT * FROM v_tramas");
			//return $request->desde;
			//$desde = date($request->desde, 'Ym');
			$fechaComoEntero = strtotime($request->desde);
			$fechaComoEntero2 = strtotime($request->hasta);
			$desde = date("Ym", $fechaComoEntero);
			$hasta = date('Ym', $fechaComoEntero2);
			
			$tramas = DB::table("v_adoptadas_test")
			->where('col_a','>=',$desde)
			->where('col_a','<=',$hasta)
			->get();

			//return $tramas;
			// Open a file in write mode ('w')
			$filePath = storage_path('app/tramas_adoptadas.csv');
			$fp = fopen($filePath, 'w');
			  
			// cabecera
			$cabecera = array(
				'id', 'TIPO CODIGO RECLAMO', 'CODIGO UNICO REGISTRO', 'CODIGO MEDIDA ADOPTADA', 'DESCRIPCION MEDIDA ADOPTADA', 'NATURALEZA MEDIDA ADOPTADA', 'PROCESO MEDIDA ADOPTADA', 'FECHA INICIO', 'FECHA CULMINACION'
			);
			fputcsv($fp, (array) $cabecera, ";");

			// Loop through file pointer and a line
			foreach ($tramas as $trama) {
				fputcsv($fp, (array) $trama, ";");
			}
			fclose($fp);

			$headers = ['Content-Type: text/csv'];
			$fileName = time().'.csv';
			return response()->download($filePath, $fileName, $headers);
		}
	}
}

/* TRAMAS - SQL
CREATE OR REPLACE VIEW v_tramas AS
SELECT a.id,
	DATE_FORMAT(a.recibido_at, '%Y%m') AS col_a,
    1 AS col_b,
    12975 AS col_c,
    12975 AS col_d,
    CASE a.estado_id WHEN 3 THEN 3
    	ELSE 1
	END AS col_e,
    CASE a.estado_id WHEN 3 THEN a.traslado_codigo
    	ELSE '12975'
	END AS col_f,
    CASE a.medio_recepcion_id WHEN 1 OR 3 THEN a.medio_recepcion_id
    	ELSE 2
	END AS col_g,
    CONCAT('12975-', a.hoja_nro) AS col_h,
    CASE 
    	b.dip_tp WHEN 'RUC' THEN 'RUC'
    END AS col_i
FROM reclamos a INNER JOIN users b
	ON a.user_id = b.id
ORDER BY a.recibido_at;
*/