@extends('adminlte::page')

@section('plugins.DateTimePicker', true)

@section('plugins.Datatables', true)

@section('title', 'Reclamos - Editar')

@section('content_header')
    <h1>HOJA DE RECLAMACIONES EN SALUD Nro. {{ $reclamo->hoja_nro }}</h1>
@endsection

@section('content')
<!-- datos del paciente -->
<div class="row ">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				1. Datos del Paciente
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-3">
						<label>Tipo de Paciente</label>
						<p>{{ Form::select('paciente-tp', 
								['PARTICULAR' => 'PARTICULAR', 'ASEGURADO' => 'ASEGURADO'], 
								$reclamo->paciente_tp,
								['id' => 'paciente-tp', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label>IAFAS</label>
						<p>{{ Form::select('iafas', $iafas, $reclamo->iafas_id,
								['id' => 'iafas', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label>Doc. Identidad</label>
						<p>{{ $reclamo->user->dip_tp }}-{{ $reclamo->user->dip }}</p>
					</div>

					<div class="col-3">
						<label>Nombre</label>
						<p>{{ $reclamo->user->name }}</p>
					</div>

					<div class="col-3">
						<label>Domicilio</label>
						<p>{{ $reclamo->user->domicilio }}</p>
					</div>

					<div class="col-3">
						<label>Correo</label>
						<p>{{ $reclamo->user->email }}</p>
					</div>

					<div class="col-3">
						<label>Teléfono</label>
						<p>{{ $reclamo->user->telefono }}</p>
					</div>

					<div class="col-3">
						<label for="historia">Historia Médica</label>
						{{ Form::text('historia', $reclamo->user->codigo_historia, ['id' => 'historia', 'class' => 'form-control']) }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- datos del representante -->
<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				2. Datos del Representante
			</div>

			<div class="card-body">
			<div class="row">
					@if (is_null($representante))
						<h4>El reclamo fue presentado por el paciente.</h4>
					@else
						<div class="col col-lg-3">
							<label>Doc. Identidad</label>
							<p>{{ $representante->dip_tp }}-{{ $representante->dip }}</p>
						</div>

						<div class="col col-lg-3">
							<label>Nombre</label>
							<p>{{ $representante->name }}</p>
						</div>

						<div class="col col-lg-3">
							<label>Domicilio</label>
							<p>{{ $representante->domicilio }}</p>
						</div>

						<div class="col col-lg-3">
							<label>Correo</label>
							<p>{{ $representante->email }}</p>
						</div>

						<div class="col col-lg-3">
							<label>Teléfono</label>
							<p>{{ $representante->telefono }}</p>
						</div>
					@endif

				</div>
			</div>

		</div>
	</div>
</div>

<!-- gestion del reclamo -->
<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				3. Gestion del Reclamo
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-3">
						<label for="suceso-at">Fecha de Ocurrencia</label>
						<p>{{ Form::text('suceso-at', 
								$reclamo->suceso_at, 
								['id' => 'suceso-at', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label>Respuesta al e-mail?</label>
						<input type="text" class="form-control" readonly 
								 value="{{ ($reclamo->send_mail) ? 'Si' : 'No' }}">
					</div>

					<div class="col-3">
						<label for="recibido-at"  class="small">Fecha de Presentación del Reclamo</label>
						<p>{{ Form::text('recibido-at', $reclamo->recibido_at, 
								['id' => 'recibido-at', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label for="resuleto-at">Fecha de Resultado del Reclamo</label>
						<p>{{ Form::text('resuelto-at', $reclamo->resuelto_at, 
								['id' => 'resuelto-at', 'class' => 'form-control']) }}</p>
					</div>
					
					<div class="col-3">
						<label for="estado">Estado del Reclamo</label>
						<p>{{ Form::select('estado', $estados, $reclamo->estado_id, 
								['id' => 'estado', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label for="traslado">Traslado del Reclamo</label>
						<p>{{ Form::select('traslado', $traslados, $reclamo->traslado_id, 
								['id' => 'traslado', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label for="traslado-codigo">Código del Traslado</label>
						<p>{{ Form::text('traslado-codigo', $reclamo->traslado_codigo, 
								['id' => 'traslado-codigo', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label for="codigo-primigenio">Código Primigenio</label>
						<p>{{ Form::text('codigo-primigenio', $reclamo->codigo_primigenio, 
								['id' => 'codigo-primigenio', 'class' => 'form-control']) }}</p>
					</div>
					
					<div class="col-12">
						<label for="descripcion">Descripción del Reclamo</label>
						<p>{{ Form::textarea('descripcion', $reclamo->descripcion, 
								['class' => 'form-control', 'rows' => '3', 'readonly']) }}</p>
					</div>
					
					<div class="col-6">
						<label for="tipo">Servicio que origino el Reclamo</label>
						<p>{{ Form::select('tipo', $tipos, $reclamo->tipo_id, 
								['id' => 'tipo', 'class' => 'form-control']) }}</p>
					</div>
					
					<div class="col-3">
						<label for="origen">Área de Origen del Reclamo</label>
						<p>{{ Form::select('origen', $origenes, $reclamo->origen_id, 
								['id' => 'origen', 'class' => 'form-control']) }}</p>
					</div>
					
					<div class="col-3">
						<label for="etapa">Etapa del Reclamo</label>
						<p>{{ Form::select('etapa', $etapas, $reclamo->etapa_id, 
								['id' => 'etapa', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-2">
						<label for="causa">Causa del Reclamo</label>
						<p>{{ Form::select('causa', $causas, $reclamo->causa_id, 
								['id' => 'causa', 'class' => 'form-control', 'size' => 8]) }}</p>
					</div>

					<div class="col-2">
						<div class="form-group">
							<label for="causa-derechos">Derechos en Salud</label>
							<textarea id="causa-derecho" rows="8" class="form-control" disabled></textarea>
						</div>
					</div>

					<div class="col-3">
						<label for="causa-nombre">Causa Específica</label>
						<textarea id="causa-nombre" rows="8" class="form-control" readonly></textarea>
					</div>

					<div class="col-3">
						<label for="causa-definicion">Definición</label>
						<textarea id="causa-definicion" rows="8" class="form-control" readonly></textarea>
					</div>

					<div class="col-2">
						<label for="causa-defini">Definición corta</label>
						<textarea id="causa-defini" rows="8" class="form-control" readonly></textarea>
					</div>
					
					<div class="col-12">
						<label for="analisis">Análisis de los Hechos</label>
						<p>{{ Form::textarea('analisis', $reclamo->analisis, 
								['id' => 'analisis', 'class' => 'form-control', 'rows'=>5]) }}</p>
					</div>
					
					<div class="col">
						<label for="conclusion">Conclusiones</label>
						<p>{{ Form::textarea('conclusion', $reclamo->conclusion, 
								['id' => 'conclusion', 'class' => 'form-control','rows'=>5]) }}</p>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<!-- RESULTADO Y NOTIFICACIONES -->
<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				4. Resultado y Notificación del Reclamo
			</div>

			<div class="card-body">
				<div class="row">					
					<div class="col-3">
						<label for="resultado">Resultado del Reclamo</label>
						<p>{{ Form::select('resultado', $resultados, 
								$reclamo->resultado_id, 
								['id' => 'resultado', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label for="conclusiona">Motivo de la Conclusión Anticipada</label>
						<p>{{ Form::select('conclusiona', 
								$conclusiones_anticipadas, 
								$reclamo->conclusiona_id, 
								['id' => 'conclusiona', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-6">
						<label for="notificacion">Comunicación de Resultado de Reclamo</label>
						<p>{{ Form::select('notificacion', $notificaciones, 
							$reclamo->notificacion_id, 
							['id' => 'notificacion', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label for="notificacion-at">Fecha de Notificación de Resultado</label>
						<p>{{ Form::text('notificacion-at', $reclamo->notificacion_at, 
								['id' => 'notificacion-at', 'class' => 'form-control']) }}</p>
						{{ link_to(route('reclamos.desistimiento', ['reclamo' => $reclamo->id]), 
								'Generar Desistimiento',
								['id' => 'btn-desistimiento', 'class' =>'form-control btn btn-primary']) 
						}}
					</div>

					<div class="col-9">
						<label for="observacionr">Observación</label>
						<p>{{ Form::textarea('observacionr', $reclamo->observacionr, 
							['id' => 'observacionr', 'class' => 'form-control','rows'=>'3']) }}</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- MEDIDAS ADOPTADAS -->
<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				5. Medidas Adoptadas (HRSMA{{ $reclamo->hoja_nro }})
			</div>

			<div class="card-body">
				<div class="row">					
					<div class="col-12">
						<label for="medidas-adoptadas">Medidas Adoptadas</label>
						<p>{{ Form::textarea('medidas-adoptadas', 
								$reclamo->medidas_adoptadas, 
								['id'=>'medidas-adoptadas','class'=>'form-control','rows'=>'3']) 
							}}</p>
					</div>
					
					<div class="col-3">
						<?php 
							$ma_estado['ACTIVO'] = 'EN PROCESO';
							$ma_estado['CULMINADO'] = 'CULMINADO';
						?>
						<label for="ma-estado">Estado</label>
						<p>{{ Form::select('ma_estado', 
								$ma_estado, 
								'', 
								['id' => 'ma-estado', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label for="ma-inicio">Inicio de Implementación</label>
						<p>{{ Form::text('ma-inicio', $reclamo->ma_inicio, 
								['id' => 'ma-inicio', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-3">
						<label for="ma-fin">Fin de Implementación</label>
						<p>{{ Form::text('ma-fin', $reclamo->ma_fin, 
								['id' => 'ma-fin', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-6">
						<?php 
							$ma_tipo['NULL'] = 'SELECCIONAR:';
							$ma_tipo['2'] = 'ADMINISTRATIVA RESPECTO A PROCESOS PROPIOS DE LA IPRESS';
							$ma_tipo['4'] = 'ASISTENCIAL (PRESTACIONAL)';
							$ma_tipo['5'] = 'ADMINISTRATIVA Y ASISTENCIAL (PRESTACIONA)';
						?>

						<label for="ma-tipo">Tipo de Medida</label>
						<p>{{ Form::select('ma-tipo', $ma_tipo, 
							$reclamo->ma_tipo, 
							['id' => 'ma-tipo', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-6">
						<?php 
							$ma_proceso['NULL'] = 'SELECCIONAR:';
							$ma_proceso['1'] = 'CORREGIDO';
							$ma_proceso['2'] = 'IMPLEMENTADO';
							$ma_proceso['3'] = 'ACTUALIZADO';
							$ma_proceso['4'] = 'DADO DE BAJA';
						?>

						<label for="ma-proceso">Proceso</label>
						<p>{{ Form::select('ma-proceso', $ma_proceso, 
							$reclamo->ma_proceso, 
							['id' => 'ma-proceso', 'class' => 'form-control']) }}</p>
					</div>

					<div class="col-6">
						<?php 
							$ma_proceso2['NULL'] = 'SELECCIONAR:';
							$ma_proceso2['2'] = 'ACREDITACIÓN';
							$ma_proceso2['3'] = 'PRESTACIÓN DE SERVICIOS DE SALUD';
							$ma_proceso2['4'] = 'LIQUIDACIÓN, COBRO O PAGO AL USUARIO POR LOS SERVICIOS PRESTADOS';
							$ma_proceso2['6'] = 'OTRO PROCESO';
						?>

						<label for="ma-proceso2">Relacionado a :</label>
						<p>{{ Form::select('ma-proceso2', $ma_proceso2, 
							$reclamo->ma_proceso2, 
							['id' => 'ma-proceso2', 'class' => 'form-control']) }}</p>
					</div>
					
					<div class="col-6">
						<label for="ma-procesoo">Otro Proceso</label>
						<p>{{ Form::text('ma-procesoo', $reclamo->ma_procesoo, 
								['id' => 'ma-procesoo', 'class' => 'form-control']) }}</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- USUARIOS INVOLUCRADOS -->
<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				6. Usuarios Involucrados en el Reclamo
			</div>

			<div class="card-body">
				<div class="row">					
					<div class="col-12">
						<label for="usrs-involucrados">Usuarios Involucrados</label>
						<p>{{ Form::textarea('usrs-involucrados', 
								$reclamo->usrs_involucrados, 
								['id'=>'usrs-involucrados','class'=>'form-control','rows'=>'3']) 
							}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- DOCUMENTOS DEL RECLAMO -->
<div class="row">
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				7. Documentos del Reclamo
			</div>

			<div class="card-body">
				<div class="row mb-3">
					<div class="col-10 text-right">
						<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addDocModal">Agregar documento</button>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-8">
						<table id="dt-documentos" class="table table-bordered">
							<thead class="table-dark">
								<tr>
									<th>id</th>
									<th>Nombre del Documento</th>
									<th>Fecha</th>
									<th>Usuario</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- AGREGAR DOCUMENTO -->
<form id="form-documentos" enctype="multipart/form-data">
	<div class="modal fade" id="addDocModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title font-weight-bold">Agregar documentos al Reclamo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<input type="file" id="input-file" name="documentos[]"/>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				<button type="button" id="btn-save-document" class="btn btn-primary" data-dismiss="modal">Grabar</button>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- PIE DE PAGINA -->
<footer class="row text-center">
	<div class="col-12">
		<button id="grabar" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
		<a href="{{ route('reclamos.index') }}" class="btn btn-secondary">
			<i class="fas fa-arrow-circle-left"></i> Volver
		</a>
	</div>
</footer>

@endsection

@section('js')
<script src="{{ asset('vendor/multi-file/jquery.MultiFile.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/libreria.js') }}"></script>

<script>

$(document).ready(function () {
	// datatable
	let datatable = $('#dt-documentos').DataTable({
			"ajax": "{{ route('reclamos.get-documents', ['reclamo_id' => $reclamo->id]) }}",
			"columns": [
				{"data": "id", 
				 "visible": false
				},
				{"data": "nombre_cliente"},
				{"data": "created_at"},
				{"data": "usuario"},
				{"data":null,
					"width":"15%",
					"orderable": false,
					"render": function ( data, type, row, meta ) {
									let link_doc = "{{ url('admin/documentos/download') }}/" + row.id;
									let btn_ver = '<a href="' + link_doc + '" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>';
									let btn_del = '<button type="button" class="eliminar btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';

									return  btn_ver + btn_del;
								},
				}
			]
	});

	// configuro la carga de documentos
	$('#input-file').MultiFile({
		"accept": "pdf|docx|xlsx|jpg|jpeg",
		"max_size": 5120,
		"STRING": {
			"remove": 'Eliminar',
			"denied": 'Tipo de archivo no valido: $ext!',
			"duplicate": 'Archivo duplicado: \n$file!'
		}
  	});

	// grabar documentos
	$("#btn-save-document").click(function() {
		// si tiene documentos los envio
		if ($('input[type=file]')[0].files.length) {
			let documentos = new FormData($('#form-documentos')[0]);

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "{{ route('documentos.store', ['reclamo_id' => $reclamo->id]) }}",
				type: 'POST',
				data: documentos,
				async: false, 
				cache: false, 
				contentType: false, 
				processData: false,
				dataType: 'json',
				success: function(resp) {
							datatable.ajax.reload();
							lib_ShowMensaje("Documento subidos.");
						}
			})
		}
	});

	// eliminar documentos
	$("#dt-documentos tbody").on("click",".eliminar",function() {
		let data = datatable.row($(this).parents()).data();
		let id = data.id;

		lib_Confirmar("Seguro de ELIMINAR el Documento: " + data.nombre_cliente + "?")
		.then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: "/admin/documentos/" + id,
					type: 'DELETE',
					dataType:'json',
					success: function(resp) {
						datatable.ajax.reload();
						lib_ShowMensaje(resp.msg);
					}
				})
			}
		})
	})

	// mostrar la informacion de la causa del reclamo
	function show_causa_info(causa_id) {
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "../../causas/get_by_id/" + causa_id,
			type: 'POST',
			dataType: 'json',	
			success: function(resp) {
							$("#causa-derecho").html(resp.derechos);
							$("#causa-nombre").html(resp.nombre);
							$("#causa-definicion").html(resp.definicion);
							$("#causa-defini").html(resp.defini);
						}
		})
	}

	// IAFAS activo si el tipo de paciente es 'ASEGURADO'
	if ($("#paciente-tp").val() != 'ASEGURADO') {
		$("#iafas").prop("disabled", true);
	}

	// IAFAS inactivo si es el paciente es PARTICULAR
	$("#paciente-tp").change(function() {
		$("#iafas").prop("disabled", $(this).val() == 'PARTICULAR');
	});

	// traslado del reclamo y codigo del traslado activos 
	// si el estado del reclamo es 'TRASLADADO'
	if ($("#estado option:selected").html() != 'TRASLADADO') {
		$("#traslado").prop("disabled", true);
		$("#traslado-codigo").prop("disabled", true);
	}

	// cambio de estado del reclamo
	$("#estado").change(function() {
		// se ingresa el codigo primigenio si estado es 'ACUMULADO'
		console.log($("#estado option:selected").text());
		let temporal = $("#estado option:selected").html();
		
		if (temporal == 'ACUMULADO') {
			$("#codigo-primigenio").prop("disabled", false);
		}
		else {
			$("#codigo-primigenio").prop("disabled", true);
			$("#codigo-primigenio").prop("value", "");
		}
	});

	// medidas adoptadas activa si resultado del reclamo es FUNDADO ó FUNDADO PARCIAL
	if (($("#resultado option:selected").html() != 'FUNDADO') &&
		 ($("#resultado option:selected").html() != 'FUNDADO PARCIAL')) {
		$("#medidas-adoptadas").prop("disabled", true);
	}

	// causa
	if ('{{ $reclamo->causa_id }}' !== '') {
		show_causa_info('{{ $reclamo->causa_id }}');
	}

	// motivo de la consulta acticipada activa si resultado del reclamo es CONCLUIDO ANTICIPADAMENTE
	if ($("#resultado option:selected").html() != 'CONCLUIDO ANTICIPADAMENTE') {
		$("#conclusiona").prop("disabled", true);
	}

	// fecha de ocurrencia del inconveniente
	$('#suceso-at').datetimepicker({
		timepicker: false,
		format:"Y-m-d",
		"minDate":"0",
	});

	// fecha de recibido el reclamo
	$('#recibido-at').datetimepicker({
		timepicker: false,
		format:"Y-m-d",
		"maxDate":"0",
	});

	// fecha de respuesta del reclamo
	$('#resuelto-at').datetimepicker({
		timepicker: false,
		format:"Y-m-d",
	});

	// fecha de notificacion
	$('#notificacion-at').datetimepicker({
		timepicker: false,
		format:"Y-m-d",
		"minDate":"0",
	});

	// traslado del reclamo activo si es el estado del reclamo es TRASLADADO
	$("#estado").change(function() {
		let trasladado = ($("#estado option:selected").html() == 'TRASLADADO');

		$("#traslado").prop("disabled", !trasladado);
		$("#traslado-codigo").prop("disabled", !trasladado);
	});

	// resultado del reclamo
	$("#resultado").change(function() {
		let opcion = $("#resultado option:selected").html();

		$("#conclusiona").prop("disabled", true);
		$("#notificacion").prop("disabled", false);
		$("#notificacion-at").prop("disabled", false);
		$("#medidas-adoptadas").prop("disabled", true);
		switch(opcion) {
			case 'CONCLUIDO ANTICIPADAMENTE':
				$("#conclusiona").prop("disabled", false);
				$("#notificacion").prop("disabled", true);
				$("#notificacion-at").prop("disabled", true);
				break;
			case 'FUNDADO':
			case 'FUNDADO PARCIAL':
				$("#medidas-adoptadas").prop("disabled", false);
				break;
		}

	});

	// resultado del reclamo
	$("#conclusiona").change(function() {
			let conclusiona = this.value;
			
			$('#btn-desistimiento').prop('disabled', conclusiona != 1);
	});

	// causas del reclamo
	$("#causa").change(function() {
		show_causa_info($(this).val());
	});

	// fecha de inicio de implementacion de las medidas adoptadas
	$('#ma-inicio').datetimepicker({
		timepicker: false,
		format:"Y-m-d",
		//"maxDate":"0",
	});

	// fecha de fin de implementacion de las medidas adoptadas
	$('#ma-fin').datetimepicker({
		timepicker: false,
		format:"Y-m-d",
		//"maxDate":"0",
	});

	// grabar los datos
	$("#grabar").click(function() {
		let datos = {
			"paciente_tp": $("#paciente-tp").val(),
			"iafas_id": $("#iafas").val(),
			"codigo_historia": $("#historia").val(),
			"suceso_at": $("#suceso-at").val(),
			"recibido_at": $("#recibido-at").val(),
			"resuelto_at": $("#resuelto-at").val(),
			"estado_id": $("#estado").val(),
			"traslado_id": $("#traslado").val(),
			"traslado_codigo": $("#traslado-codigo").val(),
			"tipo_id": $("#tipo").val(),
			"causa_id": $("#causa").val(),
			"origen_id": $("#origen").val(),
			"etapa_id": $("#etapa").val(),
			"analisis": $("#analisis").val(),
			"conclusion": $("#conclusion").val(),
			"resultado_id": $("#resultado").val(),
			"medidas_adoptadas": $("#medidas-adoptadas").val(),
			"conclusiona_id": $("#conclusiona").val(),
			"notificacion_id": $("#notificacion").val(),
			"notificacion_at": $("#notificacion-at").val(),
			"ma_estado": $("#ma-estado").val(),
			"ma_inicio": $("#ma-inicio").val(),
			"ma_fin": $("#ma-fin").val(),
			"ma_tipo": $("#ma-tipo").val(),
			"ma_proceso": $("#ma-proceso").val(),
			"ma_proceso2": $("#ma-proceso2").val(),
			"ma_procesoo": $("#ma-procesoo").val(),
			"observacionr": $("#observacionr").val(),
			"usrs_involucrados": $("#usrs-involucrados").val(),
			"codigo_primigenio": $("#codigo-primigenio").val()
		}

		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			//url: "../../../admin/reclamos/{{ $reclamo->id }}",
			url:"{{ route('reclamos.update', ['reclamo' => $reclamo->id]) }}",
			data: datos,
			type: 'PUT',
			dataType: 'json',	
			success: function(resp) {
							lib_ShowMensaje(resp.msg);
							location.href="{{ route('reclamos.index') }}";
						},
			error: function(data) {
						lib_ShowMensaje("Error del Servidor.", 'error');
					}
		})
	});
})

</script>
@endsection
