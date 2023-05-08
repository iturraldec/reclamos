@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Reclamos - Visualizar')

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
						<div class="form-group">
							<label for="paciente-tp">Tipo de Paciente</label>
							{{ Form::select('paciente-tp', ['' => '', 'PARTICULAR' => 'PARTICULAR', 'ASEGURADO' => 'ASEGURADO'], $reclamo->paciente_tp, ['id' => 'paciente-tp', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
						
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="iafas">IAFAS</label>
							{{ Form::text('iafas', ($reclamo->iafas_id) ? $iafas[$reclamo->iafas_id] : '', ['id'=>'iasfas', 'class' => 'form-control','disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="dip-tp">Doc. Identidad</label>
							{{ Form::text('dip-tp', $reclamo->user->dip_tp."-".$reclamo->user->dip, ['id'=>'dip-tp', 'class' => 'form-control','disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							{{ Form::textarea('nombre', $reclamo->user->name, ['id'=>'nombre', 'class' => 'form-control','rows' => 2, 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="domicilio">Domicilio</label>
							{{ Form::textarea('domicilio', $reclamo->user->domicilio, ['id'=>'domicilio', 'class' => 'form-control', 'rows' => 2, 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="email">Correo Electrónico</label>
							{{ Form::text('email', $reclamo->user->email, ['id'=>'email', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="telefono">Teléfono</label>
							{{ Form::text('email', $reclamo->user->telefono, ['id'=>'telefono', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="codigoh">Historia Médica</label>
							{{ Form::text('codigoh', $reclamo->user->codigo_historia, ['id'=>'codigoh', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
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
						<div class="form-group">
							<label for="suceso-at">Fecha de Ocurrencia</label>
							{{ Form::text('suceso-at', $reclamo->suceso_at, ['id' => 'suceso-at', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<dib class="form-group">
							<label for="send-mail">¿Respuesta al e-mail?</label>
							{{ Form::text('send-mail', ($reclamo->send_mail) ? 'Si' : 'No', ['id' => 'send-mail', 'class' => 'form-control', 'disabled' => true]) }}
						</dib>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="recibido-at"  class="small">Fecha de Presentación del Reclamo</label>
							{{ Form::text('recibido-at', $reclamo->recibido_at, ['id' => 'recibido-at', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="resuleto-at">Fecha de Resultado del Reclamo</label>
							{{ Form::text('resuelto-at', $reclamo->resuelto_at, ['id' => 'resuelto-at', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>
					
					<div class="col-3">
						<div class="form-group">
							<label for="estado">Estado del Reclamo</label>
							{{ Form::text('estado', ($reclamo->estado_id) ? $estados[$reclamo->estado_id] : '', ['id' => 'estado', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="traslado">Traslado del Reclamo</label>
							{{ Form::text('traslado', ($reclamo->traslado_id) ? $traslados[$reclamo->traslado_id] : '', ['id' => 'traslado', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="traslado-codigo">Código del Traslado</label>
							{{ Form::text('traslado-codigo', $reclamo->traslado_codigo, ['id' => 'traslado-codigo', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>
					
					<div class="col-12">
						<div class="form-group">
							<label for="descripcion">Descripción del Reclamo</label>
							{{ Form::textarea('descripcion', $reclamo->descripcion, ['class' => 'form-control', 'rows' => '3', 'disabled' => true]) }}
						</div>
					</div>
					
					<div class="col-6">
						<div class="form-group">
							<label for="tipo">Servicio que origino el Reclamo</label>
							{{ Form::text('tipo', ($reclamo->tipo_id) ? $tipos[$reclamo->tipo_id] : '', ['id' => 'tipo', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>
					
					<div class="col-3">
						<div class="form-group">
							<label for="origen">Área de Origen del Reclamo</label>
							{{ Form::text('origen', ($reclamo->origen_id) ? $origenes[$reclamo->origen_id] : '', ['id' => 'origen', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>
					
					<div class="col-3">
						<div class="form-group">
							<label for="etapa">Etapa del Reclamo</label>
							{{ Form::text('etapa', ($reclamo->etapa_id) ? $etapas[$reclamo->etapa_id] : '', ['id' => 'etapa', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-2">
						<div class="form-group">
							<label for="causa">Causa del Reclamo</label>
							{{ Form::select('causa', $causas->getTipoArray(), $reclamo->causa_id, ['id' => 'causa', 'class' => 'form-control', 'size' => 8, 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-2">
						<div class="form-group">
							<label for="causa-derechos">Derechos en Salud</label>
							<textarea id="causa-derecho" rows="8" class="form-control" disabled></textarea>
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="causa-nombre">Causa Específica</label>
							<textarea id="causa-nombre" rows="8" class="form-control" disabled></textarea>
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="causa-definicion">Definición</label>
							<textarea id="causa-definicion" rows="8" class="form-control" disabled></textarea>
						</div>
					</div>

					<div class="col-2">
						<div class="form-group">
							<label for="causa-defini">Definición Corta</label>
							<textarea id="causa-defini" rows="8" class="form-control" disabled></textarea>
						</div>
					</div>
					
					<div class="col-12">
						<div class="form-group">
							<label for="analisis">Análisis de los Hechos</label>
							{{ Form::textarea('analisis', $reclamo->analisis, ['id' => 'analisis', 'class' => 'form-control', 'rows'=>5, 'disabled' => true]) }}
						</div>
					</div>
					
					<div class="col-12">
						<div class="form-group">
							<label for="conclusion">Conclusiones</label>
							{{ Form::textarea('conclusion', $reclamo->conclusion, ['id' => 'conclusion', 'class' => 'form-control','rows'=>5, 'disabled' => true]) }}
						</div>
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
						<div class="form-group">
							<label for="resultado">Resultado del Reclamo</label>
							{{ Form::text('resultado', ($reclamo->resultado_id) ? $resultados[$reclamo->resultado_id] : '', ['id' => 'resultado', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>
					
					<div class="col-9">
						<div class="form-group">
							<label for="medidas-adoptadas">Medidas Adoptadas</label>
							{{ Form::textarea('medidas-adoptadas', $reclamo->medidas_adoptadas, ['id'=>'medidas-adoptadas','class'=>'form-control','rows'=>'3', 'disabled' => true]) 
							}}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="conclusiona">Motivo de la Conclusión Anticipada</label>
							{{ Form::text('conclusiona', ($reclamo->conclusiona_id) ? $conclusiones_anticipadas[$reclamo->conclusiona_id] : '', ['id' => 'conclusiona', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-6">
						<div class="form-group">
							<label for="notificacion">Comunicación de Resultado de Reclamo</label>
							{{ Form::text('notificacion', ($reclamo->notificacion_id) ? $notificaciones[$reclamo->notificacion_id] : '', ['id' => 'notificacion', 'class' => 'form-control', 'disabled' => true]) }}
						</div>
					</div>

					<div class="col-3">
						<div class="form-group">
							<label for="notificacion-at">Fecha de Notificación de Resultado</label>
							{{ Form::text('notificacion-at', $reclamo->notificacion_at, ['id' => 'notificacion-at', 'class' => 'form-control', 'disabled' => true]) }}
							{{ link_to(route('reclamos.desistimiento', ['reclamo' => $reclamo->id]), 
								'Generar Desistimiento',
									['id' => 'btn-desistimiento', 'class' =>'form-control btn btn-primary']) 
							}}
						</div>
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
				<div class="row justify-content-center">
					<div class="col-8">
						<table id="dt-documentos" class="table table-bordered">
							<thead class="table-dark">
								<tr>
									<th>id</th>
									<th>Nombre del Documento</th>
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



<!-- PIE DE PAGINA -->
<footer class="row text-center">
	<div class="col-12">
		<a href="{{ route('reclamos.index') }}" class="btn btn-secondary">
			<i class="fas fa-arrow-circle-left"></i> Volver
		</a>
	</div>
</footer>

@endsection

@section('js')
<script src="/vendor/multi-file/jquery.MultiFile.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/libreria.js') }}"></script>

<script>

$(document).ready(function () {
	// datatable
	var Url = window.location.protocol+'//'+window.location.hostname;
	let datatable = $('#dt-documentos').DataTable({
			"ajax": "{{ route('reclamos.get-documents', ['reclamo_id' => $reclamo->id]) }}",
			"columns": [
				{"data": "id", 
				 "visible": false
				},
				{"data": "nombre_cliente"},
				{"data":null,
					"width":"15%",
					"orderable": false,
					"render": function ( data, type, row, meta ) {
									let btn_ver = '<a href="'+Url+'/admin/documentos/download/' + row.id + '" class="btn btn-secondary btn-sm" target="_blank" ><i class="fas fa-eye"></i></a>';
									return  btn_ver;
							},
				}
			]
	});

	// mostrar la informacion de la causa del reclamo
	let causa_id = $("#causa").val();
	
	if (causa_id != '') {
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "/admin/causas/get_by_id/" + causa_id,
			type: 'POST',
			dataType: 'json',	
			success: function(resp) {
				console.log(resp.derechos);
							$("#causa-derecho").html(resp.derechos);
							$("#causa-nombre").html(resp.nombre);
							$("#causa-definicion").html(resp.definicion);
							$("#causa-defini").html(resp.defini);
						}
		})		
	}

})

</script>
@endsection
